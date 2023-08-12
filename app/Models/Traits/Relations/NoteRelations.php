<?php

namespace App\Models\Traits\Relations;

use App\Models\Resource;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait NoteRelations
{
	
    public function resource()
    {
    	return $this->morphOne(Resource::class, 'resourceable');
    }

}