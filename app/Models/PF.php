<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PF extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'pf_type',
        'emp_share_amt',
        'emp_share_amt',
        'org_share_amt',
        'emp_share_persant',
        'org_share_persant',
        'description',
        'status'
    ];
}
