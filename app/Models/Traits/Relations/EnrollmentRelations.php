<?php

namespace App\Models\Traits\Relations;

use App\Models\EnrollmentMeta;
use App\Models\Course;
use App\Models\EnrollmentLog;
use App\Models\User;
use App\Models\Certificate;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait EnrollmentRelations
{

    public function metas()
    {
        return $this->hasMany(EnrollmentMeta::class);
    }
	
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function enrollmentLogs()
    {
    	return $this->hasMany(EnrollmentLog::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function certificate()
    {
    	return $this->hasOne(Certificate::class);
    }

}