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


    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'country' => $this->userdetail->country,
            'thumbnail' => $this->userdetail->thumbnail ? asset('/storage/' . $this->userdetail->thumbnail) : null,
            'phone' => $this->userdetail->phone,
            'status' => $this->userdetail->status,
            'last_education' => $this->userdetail->last_education,
            'major' => $this->userdetail->major,
            'location_of_education' => $this->userdetail->location_of_education,
            'description' => $this->userdetail->description,
            'city' => $this->userdetail->city,
            'address' => $this->userdetail->address,
            'book_sale' => $this->order->count(),
            'facebook' => $this->sosmed->facebook ?? "null",
            'instagram' => $this->sosmed->instagram ?? "null",
            'twitter' => $this->sosmed->twitter ?? "null",
            'github' => $this->sosmed->github ?? "null",
            'linkdin' => $this->sosmed->linkdin ?? "null",
        ];
    }

    public function book()
    {
        return $this->hasMany(book::class);
    }

    public function comment()
    {
        return $this->hasMany(comment::class);
    }
    public function userdetail()
    {
        return $this->hasOne(userdetail::class);
    }

    public function getTakeImageAttribute()
    {
        return asset('/storage/' . $this->userdetail->thumbnail);
    }
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
    public function sosmed()
    {
        return $this->hasOne(sosmed::class);
    }
    public function income()
    {
        return $this->hasOne(income::class);
    }
    public function widraw()
    {
        return $this->hasMany(widraw::class);
    }
    public function order()
    {
        return $this->hasMany(order::class, 'user_id');
    }
    public function author(){
        return;
    }
    public function purchased()
    {
        return $this->hasMany(purchased::class);
    }
}
