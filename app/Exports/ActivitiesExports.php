<?php

namespace App\Exports;

use App\Models\Activity;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ActivitiesExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {   

        $vewName = config('app.excel_view', 'app::excel.') . 'activity';

        return view($viewName, [
            'activities' => $this->getQuery()
        ]);
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Activity::class, $this->request);

    }

}