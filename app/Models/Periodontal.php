<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodontal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kartupasien(){
        return $this->belongsTo(kartupasien::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function eksplakkal(){
        return $this->belongsTo(Eksplakkal::class);
    }
}
