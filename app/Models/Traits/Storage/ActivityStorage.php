<?php

namespace App\Models\Traits\Storage;

trait ActivityStorage
{

    public function createModel($request)
    {

        $order = self::where('lesson_id', $request->lesson_id)->count();

        $activity = $this->create($request->only($this->creatable) + [
            'order' => ++$order
        ]);

        return $activity;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, self::class, 'activity_id')->updatePayload();

        return $this;

    }
    */

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