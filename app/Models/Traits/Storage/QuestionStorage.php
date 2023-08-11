<?php

namespace App\Models\Traits\Storage;

trait QuestionStorage
{

    public function createModel($request)
    {

        $question = $this->create($request->only($this->creatable));

        $question->updateModelMetas($request);

        return $question;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        $this->updateModelMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, self::class, 'question_id')->updatePayload();

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