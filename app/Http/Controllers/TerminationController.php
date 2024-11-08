<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Termination;
use App\Models\Promote;
use App\Models\Designation;
class TerminationController extends Controller
{
    public function adminTerminations(){
        $goalTypes = Promote::where('status','=',0)->latest()->get();
        $termination = DB::table('terminations')
        ->join('users','terminations.emp_id','=','users.id')
        // ->join('designations','promotes.promotion_to','=','designations.id')
        ->join('departments','users.department_id','=','departments.id')
        // ->where('goals.status','=',0) user_id
        ->select('terminations.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture as img',
        // 'designations.name as promotion_to',
        'departments.name as department_name'
        )
        ->orderBy('terminations.id','desc')->get();
        // dd($termination);
        $employees = DB::table('users')->where('role','=','employee')->latest()->get();
        $designation = Designation::latest()->get();
        return view('admin.terminations.list',compact('employees','designation','termination'));
    }
    
    public function adminTerminationsStore(Request $request){
        $data = $request->validate([
            'emp_id' => 'required',
            'notice_date' => 'required',
            'termination_date' => 'required',
            'reason' => 'required',
           
        ]);
        $termination = Termination::create($data);
        return response()->json(['success'=>'Termination added successfully...']);
    }   

    public function adminTerminationsEdit($id)
    {
        // dd('Emp-'.$id);
        // $promote = Promote::findOrFail($id);
        $terminations =  DB::table('terminations')
        ->join('users','terminations.emp_id','=','users.id')
        // ->join('designations','promotes.promotion_to','=','designations.id')
        ->join('departments','users.department_id','=','departments.id')
        // ->where('goals.status','=',0) user_id
        ->select('terminations.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture as img',
        // 'designations.name as promotion_to',
        'departments.name as department_name'
        )
        ->where('terminations.id', $id) // Filter by the specific ID
        ->first();
        
        // dd($promote);
        return response()->json($terminations);
    }

    public function adminTerminationsUpdate(Request $request){
        // dd($request->id);
        $data = $request->validate([
            'emp_id' => 'required',
            'notice_date' => 'required',
            'termination_date' => 'required',
            'reason' => 'required',
        ]);
        $promotion = Termination::findOrFail($request->id);
        $promotion->update($data);
        return response()->json(['success'=>'Promote updated successfully...']);
    }

    public function adminTerminationsDelete($id){
        $data = Termination::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

    public function findEmployeeName(Request $request){
        // dd($request->id);
        // $employee = User::find($request->id);
        $employee = DB::table('users')
        ->join('designations','users.position','=','designations.id')
        ->select('users.*','designations.name as designation')
        ->where('users.id', $request->id)
        ->first();
        // dd($employee);
        return response()->json($employee);
    }
}
