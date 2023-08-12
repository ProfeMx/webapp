<?php

namespace App\Models\Traits\Storage;

use App\Models\QuizMeta;

trait QuizStorage
{

    public function createModel($request)
    {

        $quiz = $this->create($request->only($this->creatable));

        $quiz->updateModelMetas($request);

        return $quiz;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        $this->updateModelMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, QuizMeta::class, 'quiz_id')
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