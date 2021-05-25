<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCharge extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'uid','id');
    }
}
