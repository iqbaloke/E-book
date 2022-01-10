<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','book_id','description'];

    public function book(){
        return $this->belongsTo(book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
