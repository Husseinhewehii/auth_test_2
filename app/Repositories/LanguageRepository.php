<?php

namespace App\Repositories;

use App\Models\Language;
use Symfony\Component\HttpFoundation\Request;

class LanguageRepository
{
    /**
     * @param $request
     * @return $this|mixed
     */
    public function getAllLanguages()
    {
        $languages = Language::all();

        return $languages;
    }

}
