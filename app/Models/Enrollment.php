<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\EnrollmentRelations;
use App\Models\Traits\Storage\EnrollmentStorage;
use App\Models\Traits\Assignments\EnrollmentAssignment;
use App\Models\Traits\Operations\EnrollmentOperations;
use App\Models\Traits\Mutators\EnrollmentMutators;

class Enrollment extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        EnrollmentRelations,
        EnrollmentStorage,
        EnrollmentAssignment,
        EnrollmentOperations,
        EnrollmentMutators;
        
    protected $fillable = [
        'type',
        'status',
        'grade',
        'grade_override',
        'dedication',
        'dedication_override',
        'payload',
        'course_id',
        'user_id',
        'role',
    ];

    protected $creatable = [
        'type',
        'status',
        'grade_override',
        'dedication_override',
        'payload',
        'course_id',
        'user_id',
        'role',
    ];

    protected $updatable = [
        'type',
        'status',
        'grade_override',
        'dedication_override',
        'role',
    ];

    protected $casts = [
        'payload' => 'json'
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public $allowed_type = [
        'free',
        'subscription',
        'payment',
        'external_database',
    ];

    public $allowed_status = [
        'active',
        'pending',
        'suspended',
        'finished',
    ];

}
