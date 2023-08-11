<?php

namespace App\Models\Traits\Relations;

use App\Models\CourseMeta;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait CourseRelations
{
	
	public function metas()
	{
		return $this->hasMany(CourseMeta::class);
	}

}