<?php

namespace App\Repositories\LanguageMata;

use App\Models\LanguageMeta;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class LanguageMetaRepositoryEloquent.
 *
 * @package namespace App\Repositories\LanguageMata;
 */
class LanguageMetaRepositoryEloquent extends BaseRepository implements LanguageMetaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LanguageMeta::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
