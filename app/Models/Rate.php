<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }
}
