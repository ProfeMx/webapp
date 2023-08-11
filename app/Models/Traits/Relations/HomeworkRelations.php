<?php

namespace App\Models\Traits\Relations;

use App\Models\Activity;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait HomeworkRelations
{
	
    public function activity()
    {
    	return $this->morphOne(Activity::class, 'activityable');
    }

}