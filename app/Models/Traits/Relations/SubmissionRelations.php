<?php

namespace App\Models\Traits\Relations;

use App\Models\User;
use App\Models\Homework;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait SubmissionRelations
{
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function homework()
    {
    	return $this->belongsTo(Homework::class);
    }

}