<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'goal_type_id',
        'subject',
        'target_achievement',
        'start_date',
        'end_date',
        'description',
        'status'
    ];
}
