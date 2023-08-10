<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\CareerRelations;
use App\Models\Traits\Storage\CareerStorage;
use App\Models\Traits\Assignments\CareerAssignment;
use App\Models\Traits\Operations\CareerOperations;
use App\Models\Traits\Mutators\CareerMutators;

class Career extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        CareerRelations,
        CareerStorage,
        CareerAssignment,
        CareerOperations,
        CareerMutators;
        
    protected $fillable = [
        'name',
        'description',
    ];

    protected $creatable = [
        'name',
        'description',
    ];

    protected $updatable = [
        'name',
        'description',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\CareerFactory::new();
    }
    */

}
