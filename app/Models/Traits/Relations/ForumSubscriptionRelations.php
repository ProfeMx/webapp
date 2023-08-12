<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ForumSubscriptionRelations
{
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function subscriptionable()
    {
    	return $this->morphTo();
    }

}