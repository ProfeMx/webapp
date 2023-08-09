<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ThreadRelations;
use App\Models\Traits\Storage\ThreadStorage;
use App\Models\Traits\Assignments\ThreadAssignment;
use App\Models\Traits\Operations\ThreadOperations;
use App\Models\Traits\Mutators\ThreadMutators;

class Thread extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ThreadRelations,
        ThreadStorage,
        ThreadAssignment,
        ThreadOperations,
        ThreadMutators;
        
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
        return \App\Database\Factories\ThreadFactory::new();
    }
    */

}
