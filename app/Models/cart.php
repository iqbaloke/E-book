<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','price','book_id'];

    public function user(){
        return $this->belongsTo(user::class,'user_Id');
    }
    public function book(){
        return $this->belongsTo(book::class);
    }
}
