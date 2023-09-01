<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Submission;
use App\Models\Enrollment;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubmissionPolicy
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

    public function view(User $user, Submission $submission)
    {

        // Variables requeridas

            $enrollment = $submission->enrollment;

            $course = $submission->course;

        // Verificar que el usuario pueda calificar

            $a = $course->canGrade($user);

        // Verificar si el usuario es el mismo que la envió

            $b = $enrollment->user_id === $user->id;

        // Validación compuesta

            return $a || $b;

    }

    public function create(User $user)
    {
        
        // Validación anticipada

            if(!request()->enrollment_id) return true;

        // Variables requeridas

            $enrollment = Enrollment::findOrFail(request()->enrollment_id);

        // Verificar si el usuario es el que está inscrito

            $a = $user->id === $enrollment->user_id;

        // Validación compuesta

            return $a;

    }

    public function update(User $user, Submission $submission)
    {
        // Variables requeridas

            $enrollment = $submission->enrollment;

            $course = $submission->course;

        // Verificar que el usuario pueda calificar

            $a = $course->canGrade($user);

        // Verificar si el usuario es el mismo que la envió

            $b = $enrollment->user_id === $user->id;

            $c = $submission->status === 'draft';

        // Validación compuesta

            return $a || ($b && $c);
    }

    public function delete(User $user, Submission $submission)
    {
        // Variables requeridas

            $enrollment = $submission->enrollment;

            $course = $submission->course;

        // Verificar que el usuario pueda calificar

            $a = $course->canGrade($user);

        // Verificar si el usuario es el mismo que la envió

            $b = $enrollment->user_id === $user->id;

            $c = $submission->status === 'draft';

        // Validación compuesta

            return $a || ($b && $c);
    }

    public function restore(User $user, Submission $submission)
    {
        return false;
    }

    public function forceDelete(User $user, Submission $submission)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
