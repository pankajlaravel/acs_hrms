<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PF extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'uan',
        'pf_number',
        'pf_join_date',
        'family_pf_number',
        'exits_eps',
        'allow_eps',
        'allow_epf',
        'document_type',
    ];
}
