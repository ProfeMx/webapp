<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\CourseRelations;
use App\Models\Traits\Storage\CourseStorage;
use App\Models\Traits\Assignments\CourseAssignment;
use App\Models\Traits\Operations\CourseOperations;
use App\Models\Traits\Mutators\CourseMutators;

class Course extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        CourseRelations,
        CourseStorage,
        CourseAssignment,
        CourseOperations,
        CourseMutators;
        
    protected $fillable = [
        'name',
        'payload',
    ];

    protected $creatable = [
        'name'
    ];

    protected $updatable = [
        'name'
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];


}
