<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\EnrollmentLogRelations;
use App\Models\Traits\Storage\EnrollmentLogStorage;
use App\Models\Traits\Assignments\EnrollmentLogAssignment;
use App\Models\Traits\Operations\EnrollmentLogOperations;
use App\Models\Traits\Mutators\EnrollmentLogMutators;

class EnrollmentLog extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        EnrollmentLogRelations,
        EnrollmentLogStorage,
        EnrollmentLogAssignment,
        EnrollmentLogOperations,
        EnrollmentLogMutators;
        
    protected $fillable = [
        'type',
        'dedication',
        'enrollment_id',
        'lesson_id',
    ];

    protected $creatable = [
        'type',
        'dedication',
        'enrollment_id',
        'lesson_id',
    ];

    protected $updatable = [
        'type',
        'dedication',
    ];

    public static $exportCols = [
        'type',
        'dedication',
        'enrollment_id',
        'lesson_id',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\EnrollmentLogFactory::new();
    }
    */

}
