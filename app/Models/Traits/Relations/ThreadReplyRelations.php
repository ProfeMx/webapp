<?php

namespace App\Models\Traits\Relations;

use App\Models\Thread;
use App\Models\User;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ThreadReplyRelations
{
	
    public function thread()
    {
    	return $this->belongsTo(Thread::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}