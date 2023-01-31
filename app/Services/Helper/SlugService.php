<?php

namespace App\Services\Helper;

use App\Repositories\Slug\SlugRepository;
use Illuminate\Support\Str;

class SlugService
{
    public function __construct(private SlugRepository $slugRepository)
    {
    }

    public function generateSlug($type, $name, $formId = null): array|string|null
    {
        $slug = Str::slug($name);

        $slugExist = $this->slugRepository->findWhere([
            'content' => Str::slug($name),
            ['slugable_id', '<>', $formId],
            'slugable_type' => $type
        ])->first();

        if ($slugExist) {
            $maxSlug =  $this->slugRepository->scopeQuery(function ($q) use ($slug, $type){
                return $q->where('content','like', "{$slug}%")
                    ->where('slugable_type', $type);
            })->latest('id')->first();

            $max = $maxSlug->content;

            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }
}
