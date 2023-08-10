<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\AttemptRelations;
use App\Models\Traits\Storage\AttemptStorage;
use App\Models\Traits\Assignments\AttemptAssignment;
use App\Models\Traits\Operations\AttemptOperations;
use App\Models\Traits\Mutators\AttemptMutators;

class Attempt extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        AttemptRelations,
        AttemptStorage,
        AttemptAssignment,
        AttemptOperations,
        AttemptMutators;
        
    protected $fillable = [
        'version',
        'status',
        'grade',
        'grade_override',
        'quiz_data',
        'quiz_id',
        'enrollment_id',
    ];

    protected $creatable = [
        'version',
        'status',
        'grade_override',
        'quiz_data',
        'quiz_id',
        'enrollment_id',
    ];

    protected $updatable = [
        'version',
        'status',
        'grade_override',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\AttemptFactory::new();
    }
    */

}
