<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\PathRelations;
use App\Models\Traits\Storage\PathStorage;
use App\Models\Traits\Assignments\PathAssignment;
use App\Models\Traits\Operations\PathOperations;
use App\Models\Traits\Mutators\PathMutators;

class Path extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        PathRelations,
        PathStorage,
        PathAssignment,
        PathOperations,
        PathMutators;
        
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
        return \App\Database\Factories\PathFactory::new();
    }
    */

}
