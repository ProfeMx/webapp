<?php

namespace App\Models\Traits\Relations;

use App\Models\Course;
use App\Models\Lesson;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait SectionRelations
{
	
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
    	return $this->hasMany(Lesson::class)->orderBy('order');
    }

}