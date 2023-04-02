<?php

namespace App\Repositories\Recruitment;

use App\Models\Recruitment;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class RecruitmentRepositoryEloquent extends BaseRepository implements RecruitmentRepository
{

    public function model()
    {
        return Recruitment::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getRecruitmentPaginate(array $data)
    {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);

        return $this->scopeQuery(function ($query) {
            return $query->orderBy('created_at', 'desc');
        })->with(['categories', 'updateBy', 'createBy'])->paginate($limit);
    }

    public function getByCategoryId(int $categoryId)
    {
        return $this->scopeQuery(function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();
    }
}
