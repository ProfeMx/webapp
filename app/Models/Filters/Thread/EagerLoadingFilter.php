<?php

namespace App\Models\Filters\Thread;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->load_forum == 1 || $request->load_forum == true) {

            $query->with(['forum']);

        }

        if ($request->load_user == 1 || $request->load_user == true) {

            $query->with(['user']);

        }

        if ($request->load_thread_replies == 1 || $request->load_thread_replies == true) {

            $query->with(['threadReplies']);

        }

        if ($request->load_forum_subscriptions == 1 || $request->load_forum_subscriptions == true) {

            $query->with(['forumSubscriptions']);

        }

        /*

        if ($request->load_relation == 1 || $request->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
