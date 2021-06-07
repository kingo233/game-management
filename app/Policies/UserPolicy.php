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
    public function modifyadmin(User $nowuser,User $admin){
        if($nowuser->priority != 0)return false;
        if($admin->priority == 0)return false;
        return true;
    }
    public function superadmin(User $user){
        return $user->priority == 0;
    }
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id || $currentUser->priority == 0 || $currentUser->priority == 1;
    }
    public function index(User $currentUser){
        return $currentUser->priority == 0 || $currentUser->priority == 1;
    }
    public function destroy(User $currentUser, User $user){
        if($currentUser->priority != 0 && $currentUser->priority != 1){
            return false;
        }
        return $currentUser->id != $user->id;
    }
    public function selfdie(User $currentUser, User $user)
    {
        if($currentUser->id != $user->id)return false;
        return $currentUser->priority != 0 && $currentUser->priority != 1;
    }
}
