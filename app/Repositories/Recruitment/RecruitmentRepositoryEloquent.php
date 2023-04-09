<?php

namespace App\Repositories\Recruitment;

use App\Enums\Language;
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
        $q = $data['q'] ?? '';
        $category_id = $data['category_id'] ?? '';
        $locale = $data['locale'] ?? Language::Vietnamese;

        return $this->scopeQuery(function ($query) use ($q, $locale, $category_id) {

            if ($q) {
                $query->where('title', 'like',"%$q%");
            }
            if ($category_id) {
                $query->where('category_id',$category_id);
            }

            $query->whereHas('language', function ($language) use ($locale){
                return $language->where('language_code', $locale);
            });

            return $query->orderBy('created_at', 'desc');
        })->with(['categories', 'createBy', 'language'])->paginate($limit);
    }

    public function getByCategoryId(int $categoryId)
    {
        return $this->scopeQuery(function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();
    }
}
