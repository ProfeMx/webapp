<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\QuizRelations;
use App\Models\Traits\Storage\QuizStorage;
use App\Models\Traits\Assignments\QuizAssignment;
use App\Models\Traits\Operations\QuizOperations;
use App\Models\Traits\Mutators\QuizMutators;

class Quiz extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        QuizRelations,
        QuizStorage,
        QuizAssignment,
        QuizOperations,
        QuizMutators;
        
    protected $fillable = [
        'title',
        'version',
        'payload',
    ];

    protected $creatable = [
        'title',
        'version',
    ];

    protected $updatable = [
        'title',
        'version',
    ];

    public static $exportCols = [
        'title',
        'version', 
    ];

    protected $casts = [
        'payload' => 'json'
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\QuizFactory::new();
    }
    */

}
