<?php

namespace App\Models\Filters\Forum;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_course == 1 || $request->load_course == true) {

            $query->with(['course']);

        }

        if ($request->load_forum_subscriptions == 1 || $request->load_forum_subscriptions == true) {

            $query->with(['forumSubscriptions']);

        }

        if ($request->load_threads == 1 || $request->load_threads == true) {

            $query->with(['threads']);

        }

        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
