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
        return \App\Database\Factories\AnswerFactory::new();
    }
    */

}
