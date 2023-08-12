<?php

namespace App\Models\Traits\Relations;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\User;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait AttemptRelations
{
	
    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}