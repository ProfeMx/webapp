<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\AnswerRelations;
use App\Models\Traits\Storage\AnswerStorage;
use App\Models\Traits\Assignments\AnswerAssignment;
use App\Models\Traits\Operations\AnswerOperations;
use App\Models\Traits\Mutators\AnswerMutators;

class Answer extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        AnswerRelations,
        AnswerStorage,
        AnswerAssignment,
        AnswerOperations,
        AnswerMutators;
        
    protected $fillable = [

        'status',
        'content',
        'order',

        'grade',
        'grade_override',
        'weight',

        'feedback',
        'feedback_override',
        
        'question_version',
        'question_data',
        'question_id',
        
        'attempt_id',
        
    ];

    protected $creatable = [

        'status',
        'content',
        'order',

        'grade',

        'weight',

        'feedback',

        'question_version',
        'question_data',
        'question_id',

        'attempt_id',
    ];

    protected $updatable = [

        'grade_override',

        'weight',

        'feedback_override',

    ];

    public static $exportCols = [

        'status',
        'content',
        'order',

        'grade',
        'grade_override',

        'weight',

        'feedback',
        'feedback_override',
        
        'question_version',
        'question_id',
        
        'attempt_id',

    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $allowed_status = [
        'not_answered',
        'answered',
        'flagged',
        'correct',
        'incorrect',
        'partially_correct',
    ];

    public $loadable_relations = [];


    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\AnswerFactory::new();
    }
    */

}
