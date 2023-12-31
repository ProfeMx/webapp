<?php

namespace App\Models\Traits\Storage;

use App\Models\QuestionMeta;

trait QuestionStorage
{

    public function createModel($request)
    {

        $order = self::where('quiz_id', $request->quiz_id)->count();

        $question = $this->create($request->only($this->creatable) + [
            'order' => ++$order
        ]);

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

        $this->update_metas($request, QuestionMeta::class, 'question_id')
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