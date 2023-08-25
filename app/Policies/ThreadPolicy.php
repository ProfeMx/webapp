<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {

        $exceptAbilities = [];

        if($user->isAdmin() && !in_array($ability, $exceptAbilities)){
        
            return true;
            
        }

    }

    public function index(User $user)
    {
        return true;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Thread $thread)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Thread $thread)
    {
        return $user->id === $thread->user_id;
    }

    public function delete(User $user, Thread $thread)
    {
        return $user->id === $thread->user_id;
    }

    public function restore(User $user, Thread $thread)
    {
        return false;
    }

    public function forceDelete(User $user, Thread $thread)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
