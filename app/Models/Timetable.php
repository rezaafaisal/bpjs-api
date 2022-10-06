<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function queue(){
        return $this->hasMany(Queue::class);
    }
}
