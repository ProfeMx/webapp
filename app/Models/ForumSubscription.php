<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\ForumSubscriptionRelations;
use App\Models\Traits\Storage\ForumSubscriptionStorage;
use App\Models\Traits\Assignments\ForumSubscriptionAssignment;
use App\Models\Traits\Operations\ForumSubscriptionOperations;
use App\Models\Traits\Mutators\ForumSubscriptionMutators;

class ForumSubscription extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ForumSubscriptionRelations,
        ForumSubscriptionStorage,
        ForumSubscriptionAssignment,
        ForumSubscriptionOperations,
        ForumSubscriptionMutators;
        
    protected $fillable = [
        'status',
        'user_id',
        'subscriptionable_id',
        'subscriptionable_type',
    ];

    protected $creatable = [
        'status',
        'user_id',
        'subscriptionable_id',
        'subscriptionable_type',
    ];

    protected $updatable = [
        'status',
    ];

    public static $exportCols = [
        'status',
        'user_id',
        'subscriptionable_id',
        'subscriptionable_type',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public $allowed_status = [
        'active',
        'paused',
    ];

}
