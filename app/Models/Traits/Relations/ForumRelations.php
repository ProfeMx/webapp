<?php

namespace App\Models\Traits\Relations;

use App\Models\Course;
use App\Models\ForumSubscription;
use App\Models\Thread;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ForumRelations
{
	
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function forumSubscriptions()
    {
    	return $this->hasMany(ForumSubscription::class);
    }

    public function threads()
    {
    	return $this->hasMany(Thread::class);
    }

}