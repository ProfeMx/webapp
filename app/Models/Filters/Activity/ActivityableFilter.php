<?php

namespace App\Models\Filters\Activity;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ActivityableFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->activityable_id) {

            $query->where('activityable_id', $data->activityable_id);

        }

        if ($data->activityable_type) {

            $query->where('activityable_type', $data->activityable_type);

        }

        $query = Order::orderBy($query, $data, 'activityable_id');

        $query = Order::orderBy($query, $data, 'activityable_type');

        return $query;

    }

}
