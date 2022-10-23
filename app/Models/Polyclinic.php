<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polyclinic extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function name():Attribute{
        return new Attribute(
            get: fn($val) => ucwords($val),
            set: fn($val) => strtolower($val)
        );
    }

    public function services(){
        return $this->hasMany(Service::class);
    }
}
