<?php

namespace App\Models\Traits\Storage;

trait FileStorage
{

    public function createModel($request)
    {

        $file = $this->create($request->only($this->creatable));

        return $file;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, self::class, 'file_id')->updatePayload();

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