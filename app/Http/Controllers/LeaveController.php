<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveType;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class LeaveController extends Controller
{
    public function index(){
        $user = Auth::user();
        // dd($user);
        $types = LeaveType::latest()->get();
        // $leaves = Leave::latest()->get();
            $leaves = DB::table('leaves')
            ->join('leave_types', 'leaves.leave_type_id', '=', 'leave_types.id')
            ->select('leaves.*', 'leave_types.type_name')
            ->get();
                //   dd($leaves);  
        return view('employee.leave.index',[
            'types' => $types,
            'user' => $user,
            'leaves' => $leaves
        ]);
    }

    public function applyLeave(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'leave_type_id' => 'required|exists:leave_types,id', // Ensure valid leave type
            'leave_duration' => 'nullable|string|max:255', // Ensure valid leave type
            'leave_from' => 'required|date|after_or_equal:today',
            'leave_to' => 'nullable|date|after_or_equal:leave_from',
            'description' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }
        Leave::create([
            'employee_id' => auth()->user()->id, // Assuming logged-in user
            'emp_office_id' => auth()->user()->employee_id, // Assuming logged-in user
            'leave_type_id' => $request->leave_type_id,
            'leave_duration' => $request->leave_duration,
            'leave_from' => $request->leave_from,
            'leave_to' => $request->leave_to,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Leave applied successfully',
        ]);
    }

    public function adminGetLeave(){
        $leaves = DB::table('leaves')
                  ->join('leave_types','leaves.leave_type_id','=','leave_types.id')
                  ->join('users','leaves.employee_id','=','users.id')
                  ->select('leaves.*','leave_types.type_name','users.employee_id as  empID','users.firstName','users.lastName')
                  ->orderByRaw("CASE WHEN leaves.leave_status = 'pending' THEN 0 ELSE 1 END")
                  ->get();
                // dd($leaves);
        return view('admin.leave.index',[
            'leaves' => $leaves
        ]);
    }

    public function applyGetLeave($id){
        $leave = DB::table('leaves')
    ->join('leave_types', 'leaves.leave_type_id', '=', 'leave_types.id')
    ->select('leaves.*', 'leave_types.type_name')
    ->where('leaves.id', '=', $id)
    ->first();

if ($leave) {
    $leave = collect($leave)->map(function ($value, $key) {
        if (($key === 'leave_from' || $key === 'leave_to') && $value !== null) {
            return Carbon::parse($value)->format('j M Y');
        }
        return $value;
    })->toArray();
}
        // dd($leave);
        return response()->json($leave);
    }

    public function applyLeaveVerify(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'leave_status' => 'required|string|max:255',
            
        ]);
        $leave_status = Leave::findOrFail($request->id);
        $leave_status->update($data);
        return response()->json(['success'=>'leave status updated successfully...']);
    }
}
