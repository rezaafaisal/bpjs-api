<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function times(){
        return $this->hasMany(Timetable::class);
    }

    public function queue(){
        return $this->hasMany(Queue::class);
    }
}
