<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ActivityRelations;
use App\Models\Traits\Storage\ActivityStorage;
use App\Models\Traits\Assignments\ActivityAssignment;
use App\Models\Traits\Operations\ActivityOperations;
use App\Models\Traits\Mutators\ActivityMutators;

class Activity extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ActivityRelations,
        ActivityStorage,
        ActivityAssignment,
        ActivityOperations,
        ActivityMutators;
        
    protected $fillable = [];

    protected $creatable = [];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\ActivityFactory::new();
    }
    */

}
