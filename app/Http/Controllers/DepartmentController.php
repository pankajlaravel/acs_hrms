<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    
    public function adminDepartment(){
        $departments = Department::latest()->get();
        return view('admin.department.list',compact('departments'));
    }
    
    public function adminDepartmentStore(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $department = Department::create($data);
        return response()->json(['success'=>'Department added successfully...']);
    }   

    public function adminDepartmentEdit($id)
    {
        $department = Department::findOrFail($id);
        
        // dd($department);
        return response()->json($department);
    }

    public function adminDepartmentUpdate(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $department = Department::findOrFail($request->id);
        $department->update($data);
        return response()->json(['success'=>'Department updated successfully...']);
    }

    public function adminDepartmentDelete($id){
        $data = Department::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
