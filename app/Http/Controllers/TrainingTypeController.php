<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\TrainingType;

class TrainingTypeController extends Controller
{
    public function adminTrainingType(){
        $trainingType = TrainingType::latest()->get();
        // dd($trainingType);
        return view('admin.trainingType.list',compact('trainingType'));
    }
    
    public function adminTrainingTypeStore(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $goalType = TrainingType::create($data);
        return response()->json(['success'=>'TrainingType added successfully...']);
    }   

    public function adminTrainingTypeEdit($id)
    {
       
        $trainingType = TrainingType::findOrFail($id);
        
        // dd($trainingType);
        return response()->json($trainingType);
    }

    public function adminTrainingTypeUpdate(Request $request){
        // dd($request->id);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $trainingType = TrainingType::findOrFail($request->id);
        $trainingType->update($data);
        return response()->json(['success'=>'TrainingType updated successfully...']);
    }

    public function adminTrainingTypeDelete($id){
        $data = TrainingType::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
