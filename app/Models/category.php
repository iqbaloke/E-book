<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'slug', 'thumbnail'];

    public function getTakeImageAttribute()
    {
        return asset("/storage/" . $this->thumbnail);
    }
    public function toArray()
    {
        return [
            'id' => $this->id,
            'category_name' => $this->category_name,
            'picture' => asset("/storage/" . $this->thumbnail),
            'slug' => $this->slug,
            'book_count' => $this->book_count,
            'tag_count' => $this->tags->count(),
        ];
    }
    public function book()
    {
        return $this->hasMany(book::class);
    }

    public function tags()
    {
        return $this->hasMany(tag::class);
    }
}
