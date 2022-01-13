<?php

namespace App\Policies;

use App\Models\book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function editbook(User $user, book $book){
        return $user->id === $book->user_id;
    }
    public function deletebook(User $user, book $book){
        return $user->id === $book->user_id;
    }
}
