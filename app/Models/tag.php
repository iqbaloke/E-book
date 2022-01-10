<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    protected $fillable = ['tag_name', 'slug','category_id'];

    public function book()
    {
        return $this->hasMany(book::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }
}
