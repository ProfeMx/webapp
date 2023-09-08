<?php

namespace App\Models\Filters\User;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_forum_subscriptions == 1 || $data->load_forum_subscriptions == true) {

            $query->with(['forumSubscriptions']);

        }

        if ($data->load_enrollments == 1 || $data->load_enrollments == true) {

            $query->with(['enrollments']);

        }

        if ($data->load_submissions == 1 || $data->load_submissions == true) {

            $query->with(['submissions']);

        }

        if ($data->load_attempts == 1 || $data->load_attempts == true) {

            $query->with(['attempts']);

        }

        if ($data->load_thread_replies == 1 || $data->load_thread_replies == true) {

            $query->with(['threadReplies']);

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
