<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\SubmissionRelations;
use App\Models\Traits\Storage\SubmissionStorage;
use App\Models\Traits\Assignments\SubmissionAssignment;
use App\Models\Traits\Operations\SubmissionOperations;
use App\Models\Traits\Mutators\SubmissionMutators;

class Submission extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        SubmissionRelations,
        SubmissionStorage,
        SubmissionAssignment,
        SubmissionOperations,
        SubmissionMutators;
        
    protected $fillable = [
        'status',
        'content',
        'submission_file',
        'grade',
        'grade_override',
        'weight', // El peso que agrega a la calificación final del curso
        'feedback',
        'feedback_file',
        'homework_id',
        'enrollment_id',
    ];

    protected $creatable = [
        'status',
        'content',
        'submission_file',
        'homework_id',
        'enrollment_id',
    ];

    protected $updatable = [
        'status',
        'content',
        'submission_file',
        'grade_override',
        'feedback_file',
    ];

    public static $exportCols = [
        'status',
        'content',
        'submission_file',
        'grade',
        'grade_override',
        'feedback',
        'feedback_file',
        'homework_id',
        'enrollment_id', 
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public static $allowed_status = [
        'draft',
        'send',
        'reviewed',
        'ignore', // Cuando se permite mas de un envío, y este envío es ignorado para la calificación
    ];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\SubmissionFactory::new();
    }
    */

}
