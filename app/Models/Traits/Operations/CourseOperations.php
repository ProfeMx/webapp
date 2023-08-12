<?php

namespace App\Models\Traits\Operations;

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

}
