<?php

namespace App\Models\Traits\Storage;

trait ForumSubscriptionStorage
{

    public function createModel($request)
    {

        $forumSubscription = $this->create($request->only($this->creatable));

        return $forumSubscription;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, self::class, 'forum_subscription_id')->updatePayload();

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