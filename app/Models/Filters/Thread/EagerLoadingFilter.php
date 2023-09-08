<?php

namespace App\Models\Filters\Thread;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_forum == 1 || $data->load_forum == true) {

            $query->with(['forum']);

        }

        if ($data->load_user == 1 || $data->load_user == true) {

            $query->with(['user']);

        }

        if ($data->load_thread_replies == 1 || $data->load_thread_replies == true) {

            $query->with(['threadReplies']);

        }

        if ($data->load_forum_subscriptions == 1 || $data->load_forum_subscriptions == true) {

            $query->with(['forumSubscriptions']);

        }

        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
