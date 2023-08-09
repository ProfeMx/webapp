<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\HomeworkRelations;
use App\Models\Traits\Storage\HomeworkStorage;
use App\Models\Traits\Assignments\HomeworkAssignment;
use App\Models\Traits\Operations\HomeworkOperations;
use App\Models\Traits\Mutators\HomeworkMutators;

class Homework extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        HomeworkRelations,
        HomeworkStorage,
        HomeworkAssignment,
        HomeworkOperations,
        HomeworkMutators;
        
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
        return \App\Database\Factories\HomeworkFactory::new();
    }
    */

}
