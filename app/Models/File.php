<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\FileRelations;
use App\Models\Traits\Storage\FileStorage;
use App\Models\Traits\Assignments\FileAssignment;
use App\Models\Traits\Operations\FileOperations;
use App\Models\Traits\Mutators\FileMutators;

class File extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        FileRelations,
        FileStorage,
        FileAssignment,
        FileOperations,
        FileMutators;
        
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
        return \App\Database\Factories\FileFactory::new();
    }
    */

}
