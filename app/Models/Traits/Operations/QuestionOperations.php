<?php

namespace App\Models\Traits\Operations;

trait QuestionOperations
{

    public function buildPayload()
    {

        return [];

    }

    public function updatePayload()
    {

        $this->payload = $this->buildPayload();

        return $this->save();

    }

}
