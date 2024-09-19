<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kartupasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function anamripasien(){
        return $this->hasOne(anamripasien::class);
    }
    public function anomalimukosa(){
        return $this->hasOne(Anomalimukosa::class);
    }
    public function eksplakkal(){
        return $this->hasOne(Eksplakkal::class);
    }
    public function odontogram(){
        return $this->hasOne(Odontogram::class);
    }
    public function ohis(){
        return $this->hasOne(Ohis::class);
    }
    public function pengsiperi(){
        return $this->hasOne(Pengsiperi::class);
    }
    public function vitalitas(){
        return $this->hasMany(Vitalitas::class);
    }
    public function periodontal(){
        return $this->hasMany(Periodontal::class);
    }
    public function perencanaan(){
        return $this->hasMany(Perencanaan::class);
    }
    public function pelaksanaan(){
        return $this->hasMany(Pelaksanaan::class);
    }
}
