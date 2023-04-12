<?php

namespace App\Repositories\Supplier;

use App\Enums\Language;
use App\Models\Post;
use App\Models\Supplier;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SupplierRepositoryEloquent.
 *
 * @package namespace App\Repositories\Post;
 */
class SupplierRepositoryEloquent extends BaseRepository implements SupplierRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Supplier::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getPaginate(array $data)
    {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);
        $q = $data['q'] ?? '';
        $locale = $data['locale'] ?? Language::Vietnamese;
        $data = $this->scopeQuery(function ($query) use ($q, $locale) {

            if ($q) {
                $query->where('name','like',"%$q%");
            }

            $query->whereHas('language', function ($language) use ($locale){
                return $language->where('language_code', $locale);
            });

            return $query->orderBy('created_at', 'desc');
        })->with(['language'])->paginate($limit);
        return $data;
    }

}
