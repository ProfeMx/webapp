<?php

namespace App\Models\Traits\Relations;

use App\Models\CourseMeta;
use App\Models\Path;
use App\Models\Enrollment;
use App\Models\Section;
use App\Models\Forum;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait CourseRelations
{
	
	public function metas()
	{
		return $this->hasMany(CourseMeta::class);
	}

	public function paths()
	{
		return $this->belongsToMany(Path::class)
			->withPivot('order')
			->orderBy('order')
            ->withTimestamps();
	}

	public function enrollments()
	{
		return $this->hasMany(Enrollment::class);
	}

	public function sections()
	{
		return $this->hasMany(Section::class)->orderBy('order');
	}

	public function forums()
	{
		return $this->hasMany(Forum::class);
	}

}