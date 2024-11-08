<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'name',
        'profession',
        'dob',
        'nationality',
        'gender',
        'remarks',
        'blood_group',
        'relation',
        'address_same_as_emp',
        'address',
        'pin',
        'phone',
        'email',
        'city',
        'state',
        'country',
       
    ];
}
