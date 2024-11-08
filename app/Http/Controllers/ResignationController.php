<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promote; 
use App\Models\User;    
use App\Models\Designation;
use App\Models\Resignation;
use DB;
class ResignationController extends Controller
{
    public function adminResignations(){
        $goalTypes = Promote::where('status','=',0)->latest()->get();
        $resignations = DB::table('resignations')
        ->join('users','resignations.emp_id','=','users.id')
        // ->join('designations','promotes.promotion_to','=','designations.id')
        ->join('departments','users.department_id','=','departments.id')
        // ->where('goals.status','=',0) user_id
        ->select('resignations.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture as img',
        // 'designations.name as promotion_to',
        'departments.name as department_name'
        )
        ->orderBy('resignations.id','desc')->get();
        // dd($resignations);
        $employees = DB::table('users')->where('role','=','employee')->latest()->get();
        $designation = Designation::latest()->get();
        return view('admin.resignations.list',compact('employees','designation','resignations'));
    }
    
    public function adminResignationsStore(Request $request){
        $data = $request->validate([
            'emp_id' => 'required',
            'notice_date' => 'required',
            'resignation_date' => 'required',
            'reason' => 'required',
           
        ]);
        $resignation = Resignation::create($data);
        return response()->json(['success'=>'Resignation added successfully...']);
    }   

    public function adminResignationsEdit($id)
    {
        // dd('Emp-'.$id);
        // $promote = Promote::findOrFail($id);
        $resignations = DB::table('resignations')
        ->join('users','resignations.emp_id','=','users.id')
        // ->join('designations','promotes.promotion_to','=','designations.id')
        ->join('departments','users.department_id','=','departments.id')
        // ->where('goals.status','=',0) user_id
        ->select('resignations.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture as img',
        // 'designations.name as promotion_to',
        'departments.name as department_name'
        )
        ->where('resignations.id', $id) // Filter by the specific ID
        ->first();
        
        // dd($resignations);
        return response()->json($resignations);
    }

    public function adminResignationsUpdate(Request $request){
        // dd($request->id);
        $data = $request->validate([
            'emp_id' => 'required',
            'notice_date' => 'required',
            'resignation_date' => 'required',
            'reason' => 'required',
        ]);
        $resignation = Resignation::findOrFail($request->id);
        $resignation->update($data);
        return response()->json(['success'=>'Resignation updated successfully...']);
    }

    public function adminResignationsDelete($id){
        $data = Resignation::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }

    public function findEmployeeName(Request $request){
        // dd($request->id);
        // $employee = User::find($request->id);
        $employee = DB::table('users')
        ->join('designations','users.designation_id','=','designations.id')
        ->select('users.*','designations.name as designation')
        ->where('users.id', $request->id)
        ->first();
        // dd($employee);
        return response()->json($employee);
    }
}
