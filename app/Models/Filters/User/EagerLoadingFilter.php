<?php

namespace App\Models\Filters\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_forum_subscriptions == 1 || $request->load_forum_subscriptions == true) {

            $query->with(['forumSubscriptions']);

        }

        if ($request->load_enrollments == 1 || $request->load_enrollments == true) {

            $query->with(['enrollments']);

        }

        if ($request->load_submissions == 1 || $request->load_submissions == true) {

            $query->with(['submissions']);

        }

        if ($request->load_attempts == 1 || $request->load_attempts == true) {

            $query->with(['attempts']);

        }

        if ($request->load_thread_replies == 1 || $request->load_thread_replies == true) {

            $query->with(['threadReplies']);

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
