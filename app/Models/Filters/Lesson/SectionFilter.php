<?php

namespace App\Models\Filters\Lesson;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class SectionFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->section_id) {

            $query->where('section_id', $request->section_id);

        }

        $query = Order::orderBy($query, $request, 'section_id');

        return $query;

    }

}
