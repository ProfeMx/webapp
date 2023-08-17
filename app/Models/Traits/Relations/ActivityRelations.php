<?php

namespace App\Models\Traits\Relations;

use App\Models\Lesson;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ActivityRelations
{
	
    public function lesson()
    {
    	return $this->belongsTo(Lesson::class);
    }

    public function activityable()
    {
    	return $this->morphTo();
    }

}