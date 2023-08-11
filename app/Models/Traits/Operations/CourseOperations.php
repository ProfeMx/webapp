<?php

namespace App\Models\Traits\Operations;

trait CourseOperations
{

    public function buildPayload()
    {

        return [

            'data' => [

                'description' => $this->meta('description'),

                'youtube' => $this->meta('youtube'),

                'vimeo' => $this->meta('vimeo'),

            ]

        ];

    }

    public function updatePayload()
    {

        $this->payload = $this->buildPayload();

        return $this->save();

    }

}
