<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ESI extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'esi_number',
        'status',
        
    ];
}
