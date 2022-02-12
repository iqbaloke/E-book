<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_user', 'book_id', 'read', 'read_author'];

    public function author()
    {
        return  $this->belongsTo(User::class, 'user_id');
    }

    public function userOrder()
    {
        return $this->belongsTo(User::class, 'order_user');
    }

    public function book()
    {
        return $this->belongsTo(book::class);
    }
}
