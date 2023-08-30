<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\HomeworkRelations;
use App\Models\Traits\Storage\HomeworkStorage;
use App\Models\Traits\Assignments\HomeworkAssignment;
use App\Models\Traits\Operations\HomeworkOperations;
use App\Models\Traits\Mutators\HomeworkMutators;

class Homework extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        HomeworkRelations,
        HomeworkStorage,
        HomeworkAssignment,
        HomeworkOperations,
        HomeworkMutators;
        
    protected $fillable = [
        'title',
        'type',
        'payload',
    ];

    protected $creatable = [
        'title',
        'type',
    ];

    protected $updatable = [
        'title',
        'type',
    ];

    public static $exportCols = [
        'title',
        'type',
    ];

    protected $casts = [
        'payload' => 'json'
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public static $allowed_types = [
        'text',
        'file',
        'text_file',
        'offline',
    ];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\HomeworkFactory::new();
    }
    */

}
