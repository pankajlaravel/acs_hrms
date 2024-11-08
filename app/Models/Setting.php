<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'favicon',
        'logo',
        'company_name',
        'contact_person',
        'address',
        'country',
        'city',
        'state',
        'pin_code',
        'phone',
        'mobile',
        'fax',
        'url',
        'email',
      
    ];
}
