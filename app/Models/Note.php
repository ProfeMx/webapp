<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\NoteRelations;
use App\Models\Traits\Storage\NoteStorage;
use App\Models\Traits\Assignments\NoteAssignment;
use App\Models\Traits\Operations\NoteOperations;
use App\Models\Traits\Mutators\NoteMutators;

class Note extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        NoteRelations,
        NoteStorage,
        NoteAssignment,
        NoteOperations,
        NoteMutators;
        
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
        return \App\Database\Factories\NoteFactory::new();
    }
    */

}
