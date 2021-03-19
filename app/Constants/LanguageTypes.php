<?php

namespace App\Constants;

final class LanguageTypes
{
    const ENGLISH = 1;
    const SPANISH = 2;
    const GERMAN = 3;
    const ARABIC = 4;

    public static function getList()
    {
        return [
            LanguageTypes::ENGLISH => trans("english"),
            LanguageTypes::SPANISH => trans("spanish"),
            LanguageTypes::GERMAN => trans("german"),
            LanguageTypes::ARABIC => trans("arabic"),
        ];
    }


    public static function getOne($index = '')
    {
        $list = self::getList();
        $listOne = '';
        if ($index) {
            $listOne = $list[$index];
        }
        return $listOne;
    }
}
