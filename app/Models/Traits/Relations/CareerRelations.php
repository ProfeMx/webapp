<?php

namespace App\Models\Traits\Relations;

use App\Models\Path;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait CareerRelations
{
	
    public function paths()
    {
    	return $this->belongsToMany(Path::class)
            ->withPivot('order')
            ->orderBy('order')
            ->withTimestamps();
    }

}