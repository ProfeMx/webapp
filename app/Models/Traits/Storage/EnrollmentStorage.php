<?php

namespace App\Models\Traits\Storage;

use App\Models\EnrollmentMeta;

trait EnrollmentStorage
{

    public function createModel($request)
    {

        $enrollment = $this->create($request->only($this->creatable));

        $enrollment->updateModelMetas($request);

        return $enrollment;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        $this->updateModelMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, EnrollmentMeta::class, 'enrollment_id')
            ->updatePayload();

        return $this;

    }

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}