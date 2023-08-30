<?php

namespace App\Models\Traits\Relations;

use App\Models\Activity;
use App\Models\Submission;
use App\Models\HomeworkMeta;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait HomeworkRelations
{

    public function metas() 
    {
        return $this->hasMany(HomeworkMeta::class);
    }
	
    public function activity()
    {
    	return $this->morphOne(Activity::class, 'activityable');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

}