<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'check_in',
        'check_out',
        'location',
        'latitude',
        'longitude',
        'status',
        
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id'); // Assuming 'employee_id' is the foreign key in the Attendance table
    }
}
