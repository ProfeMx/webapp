<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ForumRelations;
use App\Models\Traits\Storage\ForumStorage;
use App\Models\Traits\Assignments\ForumAssignment;
use App\Models\Traits\Operations\ForumOperations;
use App\Models\Traits\Mutators\ForumMutators;

class Forum extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ForumRelations,
        ForumStorage,
        ForumAssignment,
        ForumOperations,
        ForumMutators;
        
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
        return \App\Database\Factories\ForumFactory::new();
    }
    */

}
