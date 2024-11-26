<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType;

class LeaveTypeController extends Controller
{
    public function index(){
        $leaveTypes = LeaveType::latest()->get();
          return view('admin.leave-type.list',[
            'leaveTypes' => $leaveTypes
          ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'type_name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);
        $department = LeaveType::create($data);
        return response()->json(['success'=>'Department added successfully...']);
    } 

    public function editLeave($id)
    {
        $leave_type = LeaveType::findOrFail($id);
        return response()->json($leave_type);
    }

    public function leaveUpdate(Request $request){
        $data = $request->validate([
            'type_name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
        ]);
        $leaveType = LeaveType::findOrFail($request->id);
        $leaveType->update($data);
        return response()->json(['success'=>'Data updated successfully...']);
    }

    public function leaveDelete($id){
        $data = LeaveType::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
