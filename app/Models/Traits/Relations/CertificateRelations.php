<?php

namespace App\Models\Traits\Relations;

use App\Models\Enrollment;
// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait CertificateRelations
{
	
    public function enrollment()
    {
    	return $this->belongsTo(Enrollment::class);
    }

}