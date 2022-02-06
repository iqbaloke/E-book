<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cart;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_key', 'title', 'slug', 'price',
        'thumbnail', 'approved', 'year', 'page',
        'payment', 'description', 'discon',
        'category_id', 'tag_id', 'file_id', 'book_file', 'publish'
    ];

    public function getTakeImageAttribute()
    {
        return asset("/storage/" . $this->thumbnail);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function tag()
    {
        return $this->belongsTo(tag::class);
    }
    public function file()
    {
        return $this->belongsTo(file::class);
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    public function cart()
    {
        return $this->hasMany(cart::class);
    }

    public function order()
    {
        return $this->hasMany(order::class);
    }
    public function purchased()
    {
        return $this->hasMany(purchased::class);
    }
}
