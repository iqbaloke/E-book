<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class widraw extends Model
{
    use HasFactory;
    protected $fillable = ['widraw_key', 'user_id', 'nominal', 'payment', 'status', 'payment_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
