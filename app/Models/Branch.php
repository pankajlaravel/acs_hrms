<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['ifsc','bank_id','branch_name','status'];
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
