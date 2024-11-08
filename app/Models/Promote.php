<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promote extends Model
{
    use HasFactory;
    protected $fillable = [
        "emp_id",
        "promotion_for",
        "promotion_from",
        "promotion_to",
        "promotion_date",
        "status",
    ] ;
}
