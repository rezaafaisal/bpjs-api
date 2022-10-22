<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    public function name():Attribute{
        return new Attribute(
            get: fn($val) => ucwords($val),
            set: fn($val) => strtolower($val)
        );
    }
    
    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function queue(){
        return $this->hasMany(Queue::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
