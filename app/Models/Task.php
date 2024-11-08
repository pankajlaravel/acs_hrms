<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name',
        'assignee',
        'checklist',
        'priority',
        'start_date',
        'due_date',
        'tag',
        'followers',
        'description',
        'file',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
