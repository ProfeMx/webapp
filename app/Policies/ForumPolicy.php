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
        return true;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Forum $forum)
    {

        // PENDIENTE: Contemplar las posibilidades de un foro publico, privado, borrador
        
        return true;

    }

    public function create(User $user)
    {

        if(!request()->course_id) return true;

        $course = Course::findOrFail(request()->course_id);

        // Estas operación la puede realizar un profesor con permiso de edición
        $a = $course->isEditTeacher($user);

        return $a;
    }

    public function update(User $user, Forum $forum)
    {

        $course = $forum->course;

        // Estas operación la puede realizar un profesor con permiso de edición
        $a = $course->isEditTeacher($user);

        return $a;

    }

    public function delete(User $user, Forum $forum)
    {
        
        $course = $forum->course;

        // Estas operación la puede realizar un profesor con permiso de edición
        $a = $course->isEditTeacher($user);

        return $a;
        
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
