<?php
// app/Services/PayrollService.php

namespace App\Services;

use App\Models\Payroll;
use App\Models\User;

class PayrollService
{
    public function processPayroll($employeeId, $basicSalary, $allowances = 0, $deductions = 0)
    {
        $netSalary = $basicSalary + $allowances - $deductions;

        return Payroll::create([
            'employee_id' => $employeeId,
            'basic_salary' => $basicSalary,
            'allowances' => $allowances,
            'deductions' => $deductions,
            'net_salary' => $netSalary,
            'pay_date' => now(), // or any specific date
        ]);
    }
}
