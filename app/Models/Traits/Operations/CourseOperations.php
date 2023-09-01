<?php

namespace App\Models\Traits\Operations;

use App\Models\User;

trait CourseOperations
{

    public function buildPayload()
    {

        return [

            'description' => $this->meta('description'),

        ];

    }

    public function updatePayload()
    {

        $this->payload = $this->buildPayload();

        return $this->save();

    }

    public function isEditTeacher(User $user): bool
    {
        return true;
    }

    public function isTeacher(User $user): bool
    {
        return true;
    }

    public function canGrade(User $user):  bool
    {
        return true;
    }

}
