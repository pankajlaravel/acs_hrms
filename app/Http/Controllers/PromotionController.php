<?php

namespace App\Http\Controllers;

use App\Models\Promote;
use DB;
use App\Models\User;
use App\Models\Designation;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function adminPromotion(){
        $goalTypes = Promote::where('status','=',0)->latest()->get();
        $promotes = DB::table('promotes')
        ->join('users','promotes.emp_id','=','users.id')
        ->join('designations','promotes.promotion_to','=','designations.id')
        ->join('departments','users.department_id','=','departments.id')
        // ->where('goals.status','=',0) user_id
        ->select('promotes.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture as img',
        'designations.name as promotion_to',
        'departments.name as department_name'
        )
        ->orderBy('id','desc')->get();
        // dd($promotes);
        $employees = DB::table('users')->where('role','=','employee')->latest()->get();
        $designation = Designation::latest()->get();
        return view('admin.promote.list',compact('employees','designation','promotes'));
    }
    
    public function adminPromotionStore(Request $request){
        $data = $request->validate([
            'emp_id' => 'required',
            'promotion_from' => 'required',
            'promotion_to' => 'required',
            'promotion_date' => 'required',
           
        ]);
        $promote = Promote::create($data);
        return response()->json(['success'=>'Promote added successfully...']);
    }   

    public function adminPromotionEdit($id)
    {
        // dd('Emp-'.$id);
        // $promote = Promote::findOrFail($id);
        $promote = DB::table('promotes')
        ->join('users','promotes.emp_id','=','users.id')
        ->join('designations','promotes.promotion_to','=','designations.id')
        ->join('departments','users.department','=','departments.id')
        // ->where('goals.status','=',0) user_id
        ->select('promotes.*',
        'users.firstName as fname',
        'users.lastName as lname',
        'users.picture as img',
        'designations.name as promotion_to_name',
        'departments.name as department_name'
        )
        ->where('promotes.id', $id) // Filter by the specific ID
        ->first();
        
        // dd($promote);
        return response()->json($promote);
    }

    public function adminPromotionUpdate(Request $request){
        // dd($request->id);
        $data = $request->validate([
            // 'emp_id' => 'required',
            'promotion_for' => 'required',
            'promotion_from' => 'required',
            'promotion_to' => 'required',
            'promotion_date' => 'required',
            'status' => 'required',
        ]);
        $promotion = Promote::findOrFail($request->id);
        $promotion->update($data);
        return response()->json(['success'=>'Promote updated successfully...']);
    }

    public function adminPromotionDelete($id){
        $data = Promote::findOrFail($id);
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
