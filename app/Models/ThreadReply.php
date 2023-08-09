<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ThreadReplyRelations;
use App\Models\Traits\Storage\ThreadReplyStorage;
use App\Models\Traits\Assignments\ThreadReplyAssignment;
use App\Models\Traits\Operations\ThreadReplyOperations;
use App\Models\Traits\Mutators\ThreadReplyMutators;

class ThreadReply extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ThreadReplyRelations,
        ThreadReplyStorage,
        ThreadReplyAssignment,
        ThreadReplyOperations,
        ThreadReplyMutators;
        
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
        return \App\Database\Factories\ThreadReplyFactory::new();
    }
    */

}
