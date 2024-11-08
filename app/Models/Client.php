<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'client_id',
        'phone',
        'company_name',
        'address',
        'picture',
        'email',
        
    ];

    public static function generateClientId()
    {
        do {
            // Generate a random six-digit number
            $clientId = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (self::where('client_id', $clientId)->exists());

        return $clientId;
    }
}
