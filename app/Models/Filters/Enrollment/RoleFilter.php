<?php

namespace App\Models\Filters\Enrollment;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class RoleFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->role) {

            $query->where('role', $request->role);

        }

        $query = Order::orderBy($query, $request, 'role');

        return $query;

    }

}
