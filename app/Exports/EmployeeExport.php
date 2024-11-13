<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeExport implements FromView
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function view(): View
    {
        $query = Employee::query();

        if ($this->status) {
            $query->where('joining_status', $this->status);
        }

        return view('exports.employees', [
            'employees' => $query->get()
        ]);
    }
}
