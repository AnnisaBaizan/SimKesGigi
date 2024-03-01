<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function kartupasien(){
        return $this->hasMany(kartupasien::class);
    }
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nimnip',
        'username',
        'email',
        'password',
        'role',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
