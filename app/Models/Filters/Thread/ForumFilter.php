<?php

namespace App\Models\Filters\Thread;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ForumFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->forum_id) {

            $query->where('forum_id', $data->forum_id);

        }

        $query = Order::orderBy($query, $data, 'forum_id');

        return $query;

    }

}
