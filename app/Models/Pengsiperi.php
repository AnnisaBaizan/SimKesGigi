<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengsiperi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kartupasien(){
        return $this->belongsTo(kartupasien::class);
    }
}
