<?php

namespace App\Models\Filters\Enrollment;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class RoleFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->role) {

            $query->where('role', $data->role);

        }

        $query = Order::orderBy($query, $data, 'role');

        return $query;

    }

}
