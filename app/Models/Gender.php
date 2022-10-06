<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function patients(){
        return $this->hasMany(Patient::class);
    }
}
