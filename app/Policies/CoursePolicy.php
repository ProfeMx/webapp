<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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

    public function view(User $user, Course $course)
    {

        // Validaciones individuales

            $a = $course->status == 'public';

            $b = $course->status == 'archived';

        return ($a || $b);

    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Course $course)
    {
        return false;
    }

    public function delete(User $user, Course $course)
    {
        return false;
    }

    public function restore(User $user, Course $course)
    {
        return false;
    }

    public function forceDelete(User $user, Course $course)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

    public function assignPath(User $user)
    {
        return false;
    }

    public function deallocatePath(User $user)
    {
        return false;
    }

}
