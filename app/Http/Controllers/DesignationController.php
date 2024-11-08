<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;
use DB;

class DesignationController extends Controller
{
    public function adminDesignation(){
        // $designations = Designation::latest()->paginate(10);
        $department = Department::latest()->get();
        $designations = DB::table('designations')
        ->join('departments', 'designations.department', '=', 'departments.id')
        ->select('designations.*', 'departments.name as department_name')
        ->latest()
        ->paginate(50);
        // dd($designations);
        return view('admin.designation.list',compact('designations','department'));
    }
    
    public function adminDesignationStore(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
        $holiday = Designation::create($data);
        return response()->json(['success'=>'Designation added successfully...']);
    }   

    public function adminDesignationEdit($id)
    {
        $designation = Designation::findOrFail($id);
        
        // dd($designation);
        return response()->json($designation);
    }

    public function adminDesignationUpdate(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);
        $designation = Designation::findOrFail($request->id);
        $designation->update($data);
        return response()->json(['success'=>'Designation updated successfully...']);
    }

    public function adminDesignationDelete($id){
        $data = Designation::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
