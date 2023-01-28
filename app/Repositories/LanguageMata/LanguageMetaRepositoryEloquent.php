<?php

namespace App\Repositories\LanguageMata;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LanguageMata\LanguageMetaRepository;
use App\Entities\LanguageMata\LanguageMeta;
use App\Validators\LanguageMata\LanguageMetaValidator;

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
