<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
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

        // NOTA: Considerar la política para el listado de secciones
        // if(!request()->course_id) return false;
        // if(!request()->sections_id) return false;


        return true;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Lesson $lesson)
    {
        return true;
    }

    public function create(User $user)
    {

        if(!request()->section_id) return true;

        $course = \App\Models\Section::findOrFail(request()->section_id)->course;

        if(!$course->isEditTeacher($user)) return false;

        return true;

    }

    public function update(User $user, Lesson $lesson)
    {
        
        $course = $lesson->course;

        if(!$course->isEditTeacher($user)) return false;

        return true;

    }

    public function delete(User $user, Lesson $lesson)
    {
        $course = $lesson->course;

        if(!$course->isEditTeacher($user)) return false;

        return true;
    }

    public function restore(User $user, Lesson $lesson)
    {
        return false;
    }

    public function forceDelete(User $user, Lesson $lesson)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
