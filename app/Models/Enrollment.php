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
        'start_at', // Se usa para indicar cuando inicia la inscripción fecha posterior o anterior a la creación de la misma
        'end_at', // Fecha de expiración de la inscripción
    ];

    protected $creatable = [
        'type',
        'status',
        'course_id',
        'user_id',
        'role',
        'start_at',
        'end_at',
    ];

    protected $updatable = [
        'type',
        'status',
        'grade_override',
        'dedication_override',
        'role',
        'start_at',
        'end_at',
    ];

    public static $exportCols = [
        'type',
        'status',
        'grade_override',
        'dedication_override',
        'course_id',
        'user_id',
        'role',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'payload' => 'json',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public $allowed_types = [
        'free',
        'manual',
        'import',
        'subscription',
        'payment',
        'external_database',
    ];

    public $allowed_status = [
        'active', // Alumno activo
        'pending', // Se requiere alguna acción, no puede ver el curso
        'suspended', // Ya no puede ver el contenido del curso
        'finished', // Aún puede ver el contenido del curso. Ya no se registra progreso ni eventos. Puede reiniciar.
        'close', // Ya no puede ver el contenido del curso. Puede comprar de nuevo
    ];

    public $allowed_roles = [
        'edit_teacher',
        'teacher',
        'student',
        'guest'
    ];

}
