<?php

namespace App\Models\Filters\Resource;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ResourceableFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->resourceable_id) {

            $query->where('resourceable_id', $data->resourceable_id);

        }

        if ($data->resourceable_type) {

            $query->where('resourceable_type', $data->resourceable_type);

        }

        $query = Order::orderBy($query, $data, 'resourceable_id');

        $query = Order::orderBy($query, $data, 'resourceable_type');

        return $query;

    }

}
