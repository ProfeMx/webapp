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
        
    protected $fillable = [
        'name',
        'type',
        'status',
        'weight',
        'order',
        'lesson_id',
        'activityable_id',
        'activityable_type'
    ];

    protected $creatable = [
        'name',
        'type',
        'status',
        'weight',
        'lesson_id',
        'activityable_id',
        'activityable_type'
    ];

    protected $updatable = [
        'name',
        'status',
        'weight',
    ];

    public static $exportCols = [
        'name',
        'type',
        'status',
        'weight',
        'lesson_id',
        'activityable_id',
        'activityable_type'
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [
        'lesson',
        'activityable',
    ];

    public static $allowed_types = [
        'quiz',
        'homework',
    ];

    public static $allowed_status = [
        'public',
        'draft',
    ];

    public static $allowed_activityables = [
        'App\\Models\\Homework',
        'App\\Models\\Quiz',
    ];

}
