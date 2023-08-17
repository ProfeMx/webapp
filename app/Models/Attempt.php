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
        'status',

        'grade',
        'grade_override',
        'weight',

        'feedback',
        'feedback_override',

        'quiz_version',
        'quiz_data',
        'quiz_id',
        
        'enrollment_id',
    ];

    protected $creatable = [
        'quiz_version',
        'quiz_data',
        'quiz_id',
        
        'enrollment_id',
    ];

    protected $updatable = [
        'weight',
        'grade_override',
        'feedback_override',
    ];

    public static $exportCols = [
        'id',
        'status',

        'grade',
        'grade_override',
        'weight',
        
        'feedback',
        'feedback_override',

        'quiz_version',
        'quiz_id',
        
        'enrollment_id',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public $allowed_status = [
        'not_started',
        'started',
        'finished',
    ];

}
