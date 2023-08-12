<?php

namespace App\Models\Traits\Relations;

use App\Models\QuizMeta;
use App\Models\Activity;
use App\Models\Question;
use App\Models\Attempt;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait QuizRelations
{

    public function metas()
    {
        return $this->hasMany(QuizMeta::class);
    }
	
    public function activity()
    {
    	return $this->morphOne(Activity::class, 'activityable');
    }

    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

}