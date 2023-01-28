<?php

use App\Repositories\LanguageMata\LanguageMetaRepository;

class LanguageMetaService
{
    public function __construct(private LanguageMetaRepository $languageMetaRepository)
    {
    }

    public function createPost($referenceId,$referenceType, $languageCode, $formId = null)
    {
        $data = [
            'reference_id' => $referenceId,
            'reference_type' => $referenceType,
            'language_code' => $languageCode,
            'language_meta_origin' => md5($referenceId . $referenceType . time()),
        ];

        if($formId) {
            $language = $this->languageMetaRepository->findWhere([
                'reference_id' => $formId,
                'reference_type' => $referenceType,
            ])->first();

            $data['language_meta_origin'] = $language->language_meta_origin;
        }

        $this->languageMetaRepository->create($data);
    }
}
