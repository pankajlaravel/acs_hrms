<?php
// app/Http/Controllers/PayrollController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PayrollService;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    protected $payrollService;

    public function __construct(PayrollService $payrollService)
    {
        $this->payrollService = $payrollService;
    }

    public function createPayroll(Request $request, $employeeId)
    {
        $request->validate([
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
        ]);

        $employee = User::findOrFail($employeeId);
        $payroll = $this->payrollService->processPayroll(
            $employee->id,
            $request->basic_salary,
            $request->allowances,
            $request->deductions
        );

        return response()->json($payroll);
    }

    public function viewPayroll($employeeId)
    {
        $employee = User::findOrFail($employeeId);
        $payrolls = $employee->payrolls;
        return view('payments.create_payroll',compact('employeeId'));
        // return response()->json($payrolls);
    }
}
