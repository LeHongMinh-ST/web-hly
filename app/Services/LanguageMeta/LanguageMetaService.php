<?php

namespace App\Services\LanguageMeta;

use App\Repositories\LanguageMeta\LanguageMetaRepository;

class LanguageMetaService
{
    public function __construct(private LanguageMetaRepository $languageMetaRepository)
    {
    }

    public function createPost($referenceId, $referenceType, $languageCode, $formId = null)
    {
        $data = [
            'reference_id' => $referenceId,
            'reference_type' => $referenceType,
            'language_code' => $languageCode,
            'language_meta_origin' => md5($referenceId . $referenceType . time()),
        ];

        if ($formId) {
            $language = $this->languageMetaRepository->findWhere([
                'reference_id' => $formId,
                'reference_type' => $referenceType,
            ])->first();

            $data['language_meta_origin'] = $language->language_meta_origin;
        }

        $this->languageMetaRepository->create($data);
    }

    public function getArrayLocale($referenceId, $referenceType)
    {
        $locale = $this->languageMetaRepository->findWhere(['reference_id' => $referenceId, 'reference_type' => $referenceType])->first();
        if (!$locale) {
            return [];
        }

        return $this->languageMetaRepository->findWhere(['language_meta_origin' => $locale->language_meta_origin])->pluck('language_code')->toArray();
    }

    public function getArrayLocaleId($referenceId, $referenceType)
    {
        $locale = $this->languageMetaRepository->findWhere(['reference_id' => $referenceId, 'reference_type' => $referenceType])->first();
        if (!$locale) {
            return [];
        }

        return $this->languageMetaRepository->findWhere(['language_meta_origin' => $locale->language_meta_origin])->keyBy('language_code')->toArray();
    }
}
