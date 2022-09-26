<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function services(){
        return $this->belongsToMany(Service::class, 'hospital_service', 'service_id', 'hospital_id');
    }
}
