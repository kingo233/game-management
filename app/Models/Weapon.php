<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;
    protected $fillable = [];
    public function owners(){
        return $this->belongsToMany(User::class,'weapon_assets');
    }
}
