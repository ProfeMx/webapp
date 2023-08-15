<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use App\Models\Traits\Relations\UserRelations;
use App\Models\Traits\Storage\UserStorage;
use App\Models\Traits\Assignments\UserAssignment;
use App\Models\Traits\Operations\UserOperations;
use App\Models\Traits\Mutators\UserMutators;

class User extends Authenticatable
{
    use HasApiTokens, 
        HasFactory, 
        Notifiable,
        SoftDeletes,
        MetaOperations,
        UserRelations,
        UserStorage,
        UserAssignment,
        UserOperations,
        UserMutators;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $creatable = [
        'name',
        'email',
        'password',
    ];

    protected $updatable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];
}
