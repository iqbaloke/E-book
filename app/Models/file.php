<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public function book()
    {
        return $this->hasMany(book::class);
    }
}
