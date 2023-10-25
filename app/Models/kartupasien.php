<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kartupasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function anamripasien(){
        return $this->hasOne(anamripasien::class);
    }
}
