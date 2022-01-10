<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
    use HasFactory;
    protected $fillable = ['country', 'thumbnail', 'phone', 'status', 'last_education', 'major', 'location_of_education', 'description', 'city', 'address'];
}
