<?php

namespace App\Repositories\ReportViewPage;

use App\Models\ReportViewPage;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class ReportViewPageRepositoryEloquent extends BaseRepository implements ReportViewPageRepository
{

    public function model()
    {
        return ReportViewPage::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
