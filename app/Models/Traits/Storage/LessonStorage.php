<?php

namespace App\Models\Traits\Storage;

trait LessonStorage
{

    public function createModel($request)
    {

        $lesson = $this->create($request->only($this->creatable));

        $lesson->updateModelMetas($request);

        return $lesson;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        $this->updateModelMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, self::class, 'lesson_id')->updatePayload();

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