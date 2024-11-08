<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Overtime;
use DB;

class OvertimeController extends Controller
{
    public function adminOvertime(){
        // $designations = Designation::latest()->paginate(10);
        $employees = User::where('role','employee')->select('id', 'firstName','lastName')->get();
        $get_data = DB::table('overtimes')
        ->join('users', 'overtimes.emp_id', '=', 'users.id')
        ->select('overtimes.*', 'users.firstName as fname','users.lastName as lname')
        ->latest()
        ->get();
        // dd($get_data);
        return view('admin.overtime.list',compact('employees','get_data'));
    }
    
    public function adminOvertimeStore(Request $request){
        $data = $request->validate([
            'emp_id' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $overtime = Overtime::create($data);
        return response()->json(['success'=>'Overtime added successfully...']);
    }   

    public function adminOvertimeEdit($id)
    {
        // $overtime = Overtime::findOrFail($id);
        $overtime = DB::table('overtimes')
        ->join('users','overtimes.emp_id','=','users.id')
        ->select('overtimes.*','users.firstName as emp_first_name',
                  'users.lastName as emp_last_name',
                )
                ->where('overtimes.id', $id) // Filter by the specific ID
                ->first();
        
        // dd($overtime);
        return response()->json($overtime);
    }

    public function adminOvertimeUpdate(Request $request){
        $data = $request->validate([
            'emp_id' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $overtime = Overtime::findOrFail($request->id);
        $overtime->update($data);
        return response()->json(['success'=>'Overtime updated successfully...']);
    }

    public function adminOvertimeDelete($id){
        $data = Overtime::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
