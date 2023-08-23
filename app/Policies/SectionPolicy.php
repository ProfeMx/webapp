<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Section;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
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

        return true;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Section $section)
    {
        return true;
    }

    public function create(User $user)
    {

        if(!request()->course_id) return true;

        $course = \App\Models\Course::findOrFail(request()->course_id);

        if(!$course->isEditTeacher($user)) return false;

        return true;
    }

    public function update(User $user, Section $section)
    {
        
        $course = $section->course;

        if(!$course->isEditTeacher($user)) return false;

        return true;

    }

    public function delete(User $user, Section $section)
    {

        // PENDIENTE: Considerar que si una sección tiene lecciones no se pueda eliminar.
        $lessonsCount = $section->lessons()->count();

        if($lessonsCount > 0) return false;

        $course = $section->course;

        if(!$course->isEditTeacher($user)) return false;

        return true;
    }

    public function restore(User $user, Section $section)
    {
        return false;
    }

    public function forceDelete(User $user, Section $section)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
