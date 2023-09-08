<?php

namespace App\Models\Filters\Forum;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_course == 1 || $data->load_course == true) {

            $query->with(['course']);

        }

        if ($data->load_forum_subscriptions == 1 || $data->load_forum_subscriptions == true) {

            $query->with(['forumSubscriptions']);

        }

        if ($data->load_threads == 1 || $data->load_threads == true) {

            $query->with(['threads']);

        }

        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
