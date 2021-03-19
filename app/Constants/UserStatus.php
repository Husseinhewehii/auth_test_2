<?php

namespace App\Constants;

final class UserStatus
{
    const INACTIVE = 0;
    const ACTIVE = 1;

    public static function getList()
    {
        return [
            UserStatus::INACTIVE => trans("inactive"),
            UserStatus::ACTIVE => trans("active"),
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
