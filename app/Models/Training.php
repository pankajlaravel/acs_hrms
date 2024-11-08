<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'training_type_id',
        'trainer_id',
        'emp_id',
        'trainer_cost',
        'start_date',
        'end_date',
        'description',
        'status',
    ];
}
