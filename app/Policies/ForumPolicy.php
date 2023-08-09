<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Forum;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
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
        return false;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Forum $forum)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Forum $forum)
    {
        return false;
    }

    public function delete(User $user, Forum $forum)
    {
        return false;
    }

    public function restore(User $user, Forum $forum)
    {
        return false;
    }

    public function forceDelete(User $user, Forum $forum)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
