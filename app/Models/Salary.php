<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'net_salary',
        'basic_salary',
        'tds',
        'da',
        'esi',
        'hra',
        'pf',
        'allowance',
        'prof_tax',
        'medical_allowance',
        'conveyance',
        'leave',
        'labour_welfare',
        'other',
        'invoice_id'
    ];
    public function employee()
    {
        return $this->belongsTo(User::class);
    }
    
}
