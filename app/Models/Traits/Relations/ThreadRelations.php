<?php

namespace App\Models\Traits\Relations;

use App\Models\Forum;
use App\Models\User;
use App\Models\ThreadReply;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ThreadRelations
{
	
    public function forum()
    {
    	return $this->belongsTo(Forum::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function threadReplies()
    {
    	return $this->hasMany(ThreadReply::class);
    }

}