<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
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

    public function view(User $user, Video $video)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Video $video)
    {
        return false;
    }

    public function delete(User $user, Video $video)
    {
        return false;
    }

    public function restore(User $user, Video $video)
    {
        return false;
    }

    public function forceDelete(User $user, Video $video)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
