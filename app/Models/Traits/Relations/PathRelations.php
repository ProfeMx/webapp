<?php

namespace App\Models\Traits\Relations;

use App\Models\Course;
use App\Models\Path;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait PathRelations
{
	
    public function courses()
    {
    	return $this->belongsToMany(Course::class)
            ->withPivot('order')
            ->orderBy('order')
            ->withTimestamps();
    }

    public function paths()
    {
    	return $this->belongsToMany(Path::class)
            ->withPivot('order')
            ->orderBy('order')
            ->withTimestamps();
    }

}