<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\TrainingType;

class TrainerController extends Controller
{
    public function adminTrainerType(){
        $trainers = Trainer::latest()->get();
        // dd($trainers);
        return view('admin.trainer.list',compact('trainers'));
    }
    
    public function adminTrainerTypeStore(Request $request){
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('trainers/img/'), $filename);
            $data['picture'] = $filename;
        }
        $trainer = Trainer::create($data);
        return response()->json(['success'=>'Trainer added successfully...']);
    }   

    public function adminTrainerTypeEdit($id)
    {
       
        $trainingType = Trainer::findOrFail($id);
        
        // dd($trainingType);
        return response()->json($trainingType);
    }

    public function adminTrainerTypeUpdate(Request $request){
        // dd($request->id);
        $trainer = Trainer::findOrFail($request->id);
        // dd($trainer);
        $data = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'email' => 'required|string|email|max:255|unique:trainers,email,' . $trainer->id,
            'phone' => 'required',
            'description' => 'required',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);

        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists (optional)
            if ($trainer->picture) {
                @unlink(public_path('trainers/img/' . $trainer->picture));
            }
            $filename = time() . '_' . $request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path('trainers/img/'), $filename);
            $data['picture'] = $filename;
        }
        
        $trainer->update($data);
        return response()->json(['success'=>'Trainer updated successfully...']);
    }

    public function adminTrainerTypeDelete  ($id){
        $data = Trainer::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data deleted successfully.']);
    }
}
