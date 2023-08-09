<?php

namespace App\Policies;

use App\Models\User;
use App\Models\File;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
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

    public function view(User $user, File $file)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, File $file)
    {
        return false;
    }

    public function delete(User $user, File $file)
    {
        return false;
    }

    public function restore(User $user, File $file)
    {
        return false;
    }

    public function forceDelete(User $user, File $file)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
