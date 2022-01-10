<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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

    public function book(){
        return $this->hasMany(book::class);
    }

    public function comment(){
        return $this->hasMany(comment::class);
    }
    public function userdetail(){
        return $this->hasOne(userdetail::class);
    }

    public function getTakeImageAttribute(){
        return "/storage/" . $this->userdetail->thumbnail;
    }
    public function cart(){
        return $this->hasMany(cart::class);
    }
    public function sosmed(){
        return $this->hasMany(sosmed::class);
    }
}
