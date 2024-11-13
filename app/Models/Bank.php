<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = ['bank_name','short_name','status'];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
