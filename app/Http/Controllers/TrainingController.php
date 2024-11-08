<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\TrainingType;
use DB;

class TrainingController extends Controller
{
    public function adminTraining(){
        $trainings = DB::table("trainings")
        ->join("users","trainings.emp_id","=","users.id")
        ->join("trainers","trainings.trainer_id","=","trainers.id")
        ->join("training_types","trainings.training_type_id","=","training_types.id")
        ->select("trainings.*",
            "users.firstName as emp_fname",
            "users.lastName as emp_lname",
            "users.picture as emp_picture",
            "trainers.fname as t_fname",
            "trainers.picture as t_picture",
            "trainers.lname as t_lname",
            "training_types.name as typeName",
            )->orderBy("trainings.id","desc")->get();
        $trainers = Trainer::where("status",0)->latest()->get();
        $trainingType = TrainingType::where("status",0)->latest()->get();
        $employees = User::where("role","=","employee")->latest()->get();
        // dd($trainings);
        return view('admin.training.list',compact('trainings',
        'trainers',
        'trainingType',
        'employees',
    ));
    }
    
    public function adminTrainingStore(Request $request){
        $data = $request->validate([
            'training_type_id' => 'required',
            'trainer_id' => 'required',
            'emp_id' => 'required',
            'trainer_cost' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $training = Training::create($data);
        return response()->json(['success'=>'Training added successfully...']);
    }   

    public function adminTrainingEdit($id)
    {
        $training = DB::table("trainings")
        ->join("users","trainings.emp_id","=","users.id")
        ->join("trainers","trainings.trainer_id","=","trainers.id")
        ->join("training_types","trainings.training_type_id","=","training_types.id")
        ->select("trainings.*",
            "users.firstName as emp_fname",
            "users.lastName as emp_lname",
            "users.picture as emp_picture",
            "trainers.fname as t_fname",
            "trainers.picture as t_picture",
            "trainers.lname as t_lname",
            "training_types.name as typeName",
            )->where("trainings.id","=", $id)->first();
        // $training = Training::findOrFail($id);
        
        // dd($training);
        return response()->json($training);
    }

    public function adminTrainingUpdate(Request $request){
        // dd($request->id);
        $data = $request->validate([
            'training_type_id' => 'required',
            'trainer_id' => 'required',
            'emp_id' => 'required',
            'trainer_cost' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $training = Training::findOrFail($request->id);
        $training->update($data);
        return response()->json(['success'=>'Training updated successfully...']);
    }

    public function adminTrainingDelete($id){
        $data = Training::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
