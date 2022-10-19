<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polyclinic extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function services(){
        return $this->hasMany(Service::class);
    }
}
