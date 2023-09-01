<?php

namespace App\Models\Traits\Relations;

use App\Models\User;
use App\Models\Homework;
use App\Models\Enrollment;
use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait SubmissionRelations
{

    use BelongsToThrough;
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function homework()
    {
    	return $this->belongsTo(Homework::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    // Pendiente verificación
    public function course()
    {
        return $this->belongsToThrough(Course::class, Enrollment::class);
    }

}