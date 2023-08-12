<?php

namespace App\Models\Traits\Relations;

use App\Models\LessonMeta;
use App\Models\Activity;
use App\Models\Resource;
use App\Models\EnrollmentLog;
use App\Models\Section;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait LessonRelations
{

    public function metas()
    {
        return $this->hasMany(LessonMeta::class);
    }
	
    public function activities()
    {
    	return $this->hasMany(Activity::class)->orderBy('order');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class)->orderBy('order');
    }

    public function enrollmentLogs()
    {
        return $this->hasMany(EnrollmentLog::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

}