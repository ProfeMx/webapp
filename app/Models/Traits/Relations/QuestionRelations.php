<?php

namespace App\Models\Traits\Relations;

use App\Models\QuestionMeta;
use App\Models\Quiz;
use App\Models\Answer;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait QuestionRelations
{

    public function metas()
    {
        return $this->hasMany(QuestionMeta::class);
    }
	
    public function quiz()
    {
    	return $this->belongsTo(Quiz::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

}