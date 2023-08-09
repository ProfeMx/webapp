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
        return \App\Database\Factories\QuestionFactory::new();
    }
    */

}
