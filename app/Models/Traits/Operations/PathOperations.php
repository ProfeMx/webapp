<?php

namespace App\Models\Traits\Operations;

trait PathOperations
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
