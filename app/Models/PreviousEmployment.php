<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousEmployment extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'designation',
        'from_date',
        'to_date',
        'relevant_experience_in_year',
        'relevant_experience_in_month',
        'company_address',
        'nature_of_duties',
        'leaving_reason',
    ];
}