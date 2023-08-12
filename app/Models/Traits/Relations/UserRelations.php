<?php

namespace App\Models\Traits\Relations;

use App\Models\ForumSubscription;
use App\Models\Enrollment;
use App\Models\Submission;
use App\Models\Attempt;
use App\Models\ThreadReply;
use App\Models\Thread;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait UserRelations
{
	
    public function forumSubscriptions()
    {
    	return $this->hasMany(ForumSubscription::class);
    }

    public function enrollments()
    {
    	return $this->hasMany(Enrollment::class);
    }

    public function submissions()
    {
    	return $this->hasMany(Submission::class);
    }

    public function attempts()
    {
    	return $this->hasMany(Attempt::class);
    }

    public function threadReplies()
    {
    	return $this->hasMany(ThreadReply::class);
    }

    public function threads()
    {
    	return $this->hasMany(Thread::class);
    }

}