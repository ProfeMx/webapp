<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\CertificateRelations;
use App\Models\Traits\Storage\CertificateStorage;
use App\Models\Traits\Assignments\CertificateAssignment;
use App\Models\Traits\Operations\CertificateOperations;
use App\Models\Traits\Mutators\CertificateMutators;

class Certificate extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        CertificateRelations,
        CertificateStorage,
        CertificateAssignment,
        CertificateOperations,
        CertificateMutators;
        
    protected $fillable = [
        'code',
        'payload',
        'enrollment_id',
    ];

    protected $creatable = [
        'code',
        'enrollment_id',
    ];

    protected $updatable = [];

    public static $exportCols = [
        'code',
        'enrollment_id',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\CertificateFactory::new();
    }
    */

}
