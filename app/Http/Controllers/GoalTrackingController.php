<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Goal;
use App\Models\GoalType;

class GoalTrackingController extends Controller
{
    public function adminGoalTracking(){
        $goalTypes = GoalType::where('status','=',0)->latest()->get();
        $goals = DB::table('goals')
        ->join('goal_types','goals.goal_type_id','=','goal_types.id')
        // ->where('goals.status','=',0)
        ->select('goals.*','goal_types.name as name')
        ->orderBy('id','desc')->get();
        // dd($goals);
        return view('admin.goals.list',compact('goalTypes','goals'));
    }
    
    public function adminGoalTrackingStore(Request $request){
        $data = $request->validate([
            'goal_type_id' => 'required',
            'subject' => 'required',
            'target_achievement' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $goals = Goal::create($data);
        return response()->json(['success'=>'Goal added successfully...']);
    }   

    public function adminGoalTrackingEdit($id)
    {
        // $goal = Goal::findOrFail($id);
        $goal = DB::table('goals')
        ->join('goal_types','goals.goal_type_id','=','goal_types.id')
        // ->where('goals.status','=',0)
        ->select('goals.*','goal_types.name as name')
        ->where('goals.id', $id) // Filter by the specific ID
        ->first();
        
        // dd($goal);
        return response()->json($goal);
    }

    public function adminGoalTrackingUpdate(Request $request){
        // dd($request->id);
        $data = $request->validate([
            'goal_type_id' => 'required',
            'subject' => 'required',
            'target_achievement' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);
        $goalType = Goal::findOrFail($request->id);
        $goalType->update($data);
        return response()->json(['success'=>'Goal updated successfully...']);
    }

    public function adminGoalTrackingDelete($id){
        $data = Goal::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
