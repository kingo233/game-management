<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id || $currentUser->priority == 0 || $currentUser->priority == 1;
    }
    public function index(User $currentUser){
        return $currentUser->priority == 0 || $currentUser->priority == 1;
    }
    public function destroy(User $currentUser, User $user){
        if($currentUser->priority != 0 & $currentUser->priority != 1){
            return false;
        }
        return $currentUser->id != $user->id;
    }
}
