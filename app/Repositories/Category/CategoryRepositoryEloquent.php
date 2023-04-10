<?php

namespace App\Repositories\Category;

use App\Enums\Language;
use App\Models\Category;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategroyRepositoryEloquent.
 *
 * @package namespace App\Repositories\Category;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getCategoryPaginate(array $data)
    {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);
        $q = $data['q'] ?? '';
        $locale = $data['locale'] ?? Language::Vietnamese;
        return $this->scopeQuery(function ($query) use ($q, $locale) {

            if ($q) {
                $query->where('name', 'like',"%$q%");
            }

            $query->whereHas('language', function ($language) use ($locale){
                return $language->where('language_code', $locale);
            });

            return $query->orderBy('created_at', 'desc');
        })->with(['createBy', 'language'])->paginate($limit);
    }

    public function getCategory()
    {
        return $this->scopeQuery(function ($query) {
            return $query->where('status', 1)->orderBy('created_at', 'desc');
        })->with(['updateBy', 'createBy', 'slug'])->get();
    }

    public function getByType(string $type)
    {
        return $this->scopeQuery(function ($query) use ($type) {
            return $query->where('type', $type)->orderBy('created_at', 'desc');
        })->with(['updateBy', 'createBy', 'slug'])->get();
    }
}
