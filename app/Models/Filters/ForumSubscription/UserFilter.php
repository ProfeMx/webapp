<?php

namespace App\Models\Filters\ForumSubscription;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class UserFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->user_id) {

            $query->where('user_id', $data->user_id);

        }

        $query = Order::orderBy($query, $data, 'user_id');

        return $query;

    }

}
