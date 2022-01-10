<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sosmed extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','facebook','github','instagram','linkdin','twitter'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
