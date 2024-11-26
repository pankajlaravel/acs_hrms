<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousEmployment extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'company_name',
        'designation_id',
        'from_date',
        'to_date',
        'relevant_experience_in_year',
        'relevant_experience_in_month',
        'company_address',
        'nature_of_duties',
        'leaving_reason',
    ];
}
