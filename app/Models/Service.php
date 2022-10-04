<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function hospitals(){
        return $this->belongsToMany(Hospital::class);
    }

    public function service_category(){
        return $this->belongsTo(ServiceCategory::class);
    }
}
