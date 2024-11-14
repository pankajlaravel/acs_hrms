<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ESI;

class ESIController extends Controller
{
    public function updateEsi(Request $request)
    {

        // Validate the input
        $request->validate([
            // 'employee_id' => 'required|exists:e_s_i_s,employees,id',
            'employee_id' => 'required',
            'esi_number' => 'required|string|max:20',
        ]);
        // dd($request->employee_id);
        // Find the employee and update the ESI number
        // $employee = ESI::findOrFail($request->employee_id);
        $employee = ESI::where('employee_id', $request->employee_id)->first();
        if ($employee) {
            // Employee exists, so update the ESI number
            $employee->esi_number = $request->esi_number;
            $employee->update();
            $message = 'ESI number updated successfully.';
        } else {
            // Employee does not exist, so create a new employee record
            $employee = ESI::create([
                'employee_id' => $request->employee_id,
                'esi_number' => $request->esi_number,
            ]);
            $message = 'New employee record created with ESI number.';
        }

        // Respond with success status
        return response()->json(['status' => 'success', 'message' => 'ESI number updated successfully.']);
    }
}
