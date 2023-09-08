<?php

namespace App\Models\Filters\Lesson;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class SectionFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->section_id) {

            $query->where('section_id', $data->section_id);

        }

        $query = Order::orderBy($query, $data, 'section_id');

        return $query;

    }

}
