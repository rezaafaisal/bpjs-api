<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function timetable(){
        return $this->belongsTo(Timetable::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
