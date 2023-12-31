<?php

namespace App\Models\Traits\Operations;

trait UserOperations
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

    public function isAdmin()
    {

        return $this->id === 1;

    }

}
