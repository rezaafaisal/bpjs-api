<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function services(){
        return $this->hasMany(Services::class);
        // return $this->belongsToMany(Service::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }
}
