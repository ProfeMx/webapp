<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\QuestionRelations;
use App\Models\Traits\Storage\QuestionStorage;
use App\Models\Traits\Assignments\QuestionAssignment;
use App\Models\Traits\Operations\QuestionOperations;
use App\Models\Traits\Mutators\QuestionMutators;

class Question extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        QuestionRelations,
        QuestionStorage,
        QuestionAssignment,
        QuestionOperations,
        QuestionMutators;
        
    protected $fillable = [
        'version',
        'type',
        'order',
        'weight',
        'payload',
        'quiz_id',
    ];

    protected $creatable = [
        'version',
        'type',
    ];

    protected $updatable = [
        'version',
    ];

    public static $exportCols = [
        'version',
        'type', 
    ];

    protected $casts = [
        'payload' => 'json'
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public $allowed_type = [
        'true_false',
        'single_option',
        'multi_option',
        'short_answer'
    ];

}
