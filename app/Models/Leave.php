<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'emp_office_id',
        'leave_duration',
        'leave_type_id',
        'leave_from',
        'leave_to',
        'description',
        'leave_status',
        
    ];
}
