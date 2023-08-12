<?php

namespace App\Models\Traits\Relations;

use App\Models\Attempt;
use App\Models\Question;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait AnswerRelations
{
	
    public function attempt()
    {
    	return $this->belongsTo(Attempt::class);
    }

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

}