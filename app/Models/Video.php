<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\VideoRelations;
use App\Models\Traits\Storage\VideoStorage;
use App\Models\Traits\Assignments\VideoAssignment;
use App\Models\Traits\Operations\VideoOperations;
use App\Models\Traits\Mutators\VideoMutators;

class Video extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        VideoRelations,
        VideoStorage,
        VideoAssignment,
        VideoOperations,
        VideoMutators;
        
    protected $fillable = [
        'title',
        'source',
        'code',
    ];

    public $creatable = [
        'title',
        'source',
        'code',
    ];

    protected $updatable = [
        'title',
    ];

    public static $exportCols = [
        'title',
        'source',
        'code',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public static $allowed_sources = [
        'vimeo',
        'cloudvideo',
        'youtube',
    ];

    /*
    protected static function newFactory()
    {
        return \App\Database\Factories\VideoFactory::new();
    }
    */

}
