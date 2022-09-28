<?php

namespace App\Policies;

use App\Models\Quater;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuaterPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Quater $quater){

        if ($user->id === $quater->user_id) {
            
            return true;
        }else{
            return false;
        }
    }
}
