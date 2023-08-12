<?php

namespace App\Models\Filters\Resource;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ResourceableFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->resourceable_id) {

            $query->where('resourceable_id', $request->resourceable_id);

        }

        if ($request->resourceable_type) {

            $query->where('resourceable_type', $request->resourceable_type);

        }

        $query = Order::orderBy($query, $request, 'resourceable_id');

        $query = Order::orderBy($query, $request, 'resourceable_type');

        return $query;

    }

}
