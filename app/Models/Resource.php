<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ResourceRelations;
use App\Models\Traits\Storage\ResourceStorage;
use App\Models\Traits\Assignments\ResourceAssignment;
use App\Models\Traits\Operations\ResourceOperations;
use App\Models\Traits\Mutators\ResourceMutators;

class Resource extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ResourceRelations,
        ResourceStorage,
        ResourceAssignment,
        ResourceOperations,
        ResourceMutators;
        
    protected $fillable = [
        'name',
        'type',
        'status',
        'order',
        'lesson_id',
        'resourceable_id',
        'resourceable_type',
    ];

    protected $creatable = [
        'name',
        'type',
        'status',
        'lesson_id',
        'resourceable_id',
        'resourceable_type',
    ];

    protected $updatable = [
        'name',
        'status',
    ];

    public static $exportCols = [
        'name',
        'type',
        'status',
        'lesson_id',
        'resourceable_id',
        'resourceable_type', 
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public static $allowed_types = [
        'note',
        'video',
        'file',
    ];

    public static $allowed_status = [
        'public',
        'draft',
    ];

}
