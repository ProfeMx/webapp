<?php

namespace App\Models\Filters\ForumSubscription;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class SubscriptionableFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->subscriptionable_id) {

            $query->where('subscriptionable_id', $request->subscriptionable_id);

        }

        if ($request->subscriptionable_type) {

            $query->where('subscriptionable_type', $request->subscriptionable_type);

        }

        $query = Order::orderBy($query, $request, 'subscriptionable_id');

        $query = Order::orderBy($query, $request, 'subscriptionable_type');

        return $query;

    }

}
