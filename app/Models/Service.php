<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function hospitals(){
        return $this->belongsToMany(Hospital::class);
    }

    // public function service_category(){
    //     return $this->belongsTo(ServiceCategory::class);
    // }

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }

    public function queues(){
        return $this->hasMany(Queues::class);
    }

    public function polyclinic(){
        return $this->belongsTo(Polyclinic::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

}
