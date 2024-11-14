<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\PF;
use App\Models\User;
class PFController extends Controller
{
    public function updatePF(Request $request)
    {

        // dd($request->all());
        // Validate the input
        $request->validate([
            // 'employee_id' => 'required|exists:e_s_i_s,employees,id',
            'employee_id' => 'required',
                'uan' => 'required|string|max:20',
                'pf_number' => 'required|string|max:20',
                'pf_join_date' => 'required|string|max:20',
                'family_pf_number' => 'required|string|max:20',
                'exits_eps' => 'required|string|max:20',
                'allow_eps' => 'required|string|max:20',
                'allow_epf' => 'required|string|max:20',
                // 'document_type' => 'required|string|max:20',
        ]);
        // dd($request->employee_id);
        // Find the employee and update the PF number
        // $employee = PF::findOrFail($request->employee_id);
        $employee = PF::where('employee_id', $request->employee_id)->first();
        if ($employee) {
            // Employee exists, so update the PF number
            $employee->uan = $request->uan;
            $employee->pf_number = $request->pf_number;
            $employee->pf_join_date = $request->pf_join_date;
            $employee->family_pf_number = $request->family_pf_number;
            $employee->exits_eps = $request->exits_eps;
            $employee->allow_epf = $request->allow_epf;
            $employee->allow_eps = $request->allow_eps;
            $employee->allow_epf = $request->allow_epf;
            $employee->update();
            $message = 'PF number updated successfully.';
        } else {
            // Employee does not exist, so create a new employee record
            $employee = PF::create([
                'employee_id' => $request->employee_id,
                'uan' => $request->uan,
                'pf_number' => $request->pf_number,
                'pf_join_date' => $request->pf_join_date,
                'family_pf_number' => $request->family_pf_number,
                'exits_eps' => $request->exits_eps,
                'allow_eps' => $request->allow_eps,
                'allow_epf' => $request->allow_epf,
                'document_type' => $request->document_type,
            ]);
            $message = 'New employee record created with PF number.';
        }

        // Respond with success status
        return response()->json(['status' => 'success', 'message' => 'PF number updated successfully.']);
    }
    
}

