<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'basic_salary',
        'allowances',
        'deductions',
        'net_salary',
        'pay_date',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
