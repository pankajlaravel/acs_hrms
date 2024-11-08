<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoalType;
use App\Models\Goal;
class GoalController extends Controller
{
    public function adminGoalType(){
        $goalTypes = GoalType::latest()->get();
        // dd($goalTypes);
        return view('admin.goalType.list',compact('goalTypes'));
    }
    
    public function adminGoalTypeStore(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $goalType = GoalType::create($data);
        return response()->json(['success'=>'Holiday added successfully...']);
    }   

    public function adminGoalTypeEdit($id)
    {
        $goalType = GoalType::findOrFail($id);
        
        // dd($goalType);
        return response()->json($goalType);
    }

    public function adminGoalTypeUpdate(Request $request){
        // dd($request->id);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $goalType = GoalType::findOrFail($request->id);
        $goalType->update($data);
        return response()->json(['success'=>'GoalType updated successfully...']);
    }

    public function adminGoalTypeDelete($id){
        $data = GoalType::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
