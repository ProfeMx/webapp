<?php

namespace App\Models\Traits\Storage;

trait ForumStorage
{

    public function createModel($request)
    {

        $forum = $this->create($request->only($this->creatable));

        return $forum;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, self::class, 'forum_id')->updatePayload();

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