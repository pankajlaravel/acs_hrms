<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    use HasFactory;
    protected $fillable = [
        "emp_id",
        "notice_date",
        "termination_date",
        "reason",
    ];
}
