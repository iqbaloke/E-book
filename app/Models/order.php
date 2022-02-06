<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['order_key', 'book_id', 'user_id', 'user_order', 'price', 'status', 'expired', 'payment'];

    public function book()
    {
        return $this->belongsTo(book::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(user::class);
    // }

    public function author(){
        return $this->belongsTo(user::class, 'user_id');
    }

    public function userOrder(){
        return $this->belongsTo(user::class, 'user_order');
    }

    public function user_order(){
        return $this->belongsTo(user::class);
    }
}
