<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller
{
    public function storeFamilyDetails(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'emp_id' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'dob' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'relation' => 'nullable|string|max:255',
            'address_same_as_emp' => 'nullable|string|max:255',
            'pin' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            
        ]);
        $family_data = Family::create($data);
        return response()->json(['success'=>'Family added successfully...']);
    }

    public function getEmpId(Request $request){
        $employee_id = $request->session()->get('emp_id');
        return response()->json([
            'employee_id' => $employee_id
        ]);
    }
}
