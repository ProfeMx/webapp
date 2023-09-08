<?php

namespace App\Models\Filters\ForumSubscription;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class SubscriptionableFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->subscriptionable_id) {

            $query->where('subscriptionable_id', $data->subscriptionable_id);

        }

        if ($data->subscriptionable_type) {

            $query->where('subscriptionable_type', $data->subscriptionable_type);

        }

        $query = Order::orderBy($query, $data, 'subscriptionable_id');

        $query = Order::orderBy($query, $data, 'subscriptionable_type');

        return $query;

    }

}
