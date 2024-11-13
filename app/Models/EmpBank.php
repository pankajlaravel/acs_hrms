<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'bank_id',
        'bank_branch_id',
        'account_no',
        'account_type',
        'payment_type',
        'account_holder_name',
    ];
}
