<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;


class EmployeesExport implements FromCollection
{
    protected $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function collection()
    {
        return $this->employees;
    }
}
