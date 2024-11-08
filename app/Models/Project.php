<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'project_id',
        'client_id',
        'start_date',
        'end_date',
        'rate',
        'rate_type',
        'priority',
        'lead_id',
        'description',
        'picture',
    ];

    public static function generateProjectId()
    {
        do {
            // Generate a random six-digit number
            $projectId = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (self::where('project_id', $projectId)->exists());

        return $projectId;
    }
}
