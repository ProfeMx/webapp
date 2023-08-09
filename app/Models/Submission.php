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
        return \App\Database\Factories\SubmissionFactory::new();
    }
    */

}
