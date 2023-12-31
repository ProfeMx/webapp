<?php

namespace App\Exports;

use App\Models\Lesson;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LessonsExports implements FromView
{

    protected $data;

    public function __construct(array $data) 
    {

        $this->data = $data;

    }

    public function view(): View
    {
        return view(
            config(
                'app.excel_view', 
                'app::excel.'
            ) . 'lesson', 
            [
                'lessons' => $this->getQuery(),
                'exportCols' => Lesson::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Lesson::class, $this->data);

    }

}