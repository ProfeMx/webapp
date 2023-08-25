<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ForumSubscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumSubscriptionPolicy
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

    public function view(User $user, ForumSubscription $forumSubscription)
    {
        return $user->id === $forumSubscription->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, ForumSubscription $forumSubscription)
    {
        return $user->id === $forumSubscription->user_id;
    }

    public function delete(User $user, ForumSubscription $forumSubscription)
    {
        return $user->id === $forumSubscription->user_id;
    }

    public function restore(User $user, ForumSubscription $forumSubscription)
    {
        return false;
    }

    public function forceDelete(User $user, ForumSubscription $forumSubscription)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
