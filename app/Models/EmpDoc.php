<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpDoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'doc_name',
        'category',
        'description',
        'file',
        'isActive',
    ];
}
