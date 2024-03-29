<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }
}
