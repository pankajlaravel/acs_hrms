<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resignation extends Model
{
    use HasFactory;
    protected $fillable = [
        "emp_id",
        "notice_date",
        "resignation_date",
        "reason",
    ];
}
