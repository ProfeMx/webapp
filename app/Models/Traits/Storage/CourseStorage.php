<?php

namespace App\Models\Traits\Storage;

use App\Models\CourseMeta;

trait CourseStorage
{

    public function createModel($request)
    {

        $course = $this->create($request->only($this->creatable));

        $course->updateModelMetas($request);

        return $course;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        $this->updateModelMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, CourseMeta::class, 'course_id')
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