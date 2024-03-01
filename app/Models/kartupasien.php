<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kartupasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function anamripasien(){
        return $this->hasMany(anamripasien::class);
    }
    public function anomalimukosa(){
        return $this->hasMany(Anomalimukosa::class);
    }
    public function eksplakkal(){
        return $this->hasMany(Eksplakkal::class);
    }
    public function odontogram(){
        return $this->hasMany(Odontogram::class);
    }
    public function ohis(){
        return $this->hasMany(Ohis::class);
    }
    public function pengsiperi(){
        return $this->hasMany(Pengsiperi::class);
    }
    public function vitalitas(){
        return $this->hasMany(Vitalitas::class);
    }
}
