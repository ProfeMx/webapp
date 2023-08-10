<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\SectionRelations;
use App\Models\Traits\Storage\SectionStorage;
use App\Models\Traits\Assignments\SectionAssignment;
use App\Models\Traits\Operations\SectionOperations;
use App\Models\Traits\Mutators\SectionMutators;

class Section extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        SectionRelations,
        SectionStorage,
        SectionAssignment,
        SectionOperations,
        SectionMutators;
        
    protected $fillable = [
        'name',
        'order',
        'course_id'
    ];

    protected $creatable = [
        'name',
        'order',
        'course_id'
    ];

    protected $updatable = [
        'name',
        'order',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\SectionFactory::new();
    }
    */

}
