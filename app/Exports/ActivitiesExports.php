<?php

namespace App\Exports;

use App\Models\Activity;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ActivitiesExports implements FromView
{

    protected $data;

    public function __construct(array $data) 
    {

        $this->data = $data;

    }

    public function view(): View
    {   

        $vewName = config('app.excel_view', 'app::excel.') . 'activity';

        return view($viewName, [
            'activities' => $this->getQuery(),
            'exportCols' => Activity::$exportCols,
        ]);
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Activity::class, $this->data);

    }

}