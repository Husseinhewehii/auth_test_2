<?php

namespace App\Constants;

final class UserStatus
{
    const ACTIVE = 1;
    const INACTIVE = 2;

    public static function getList()
    {
        return [
            UserStatus::ACTIVE => "Active",
            UserStatus::INACTIVE => "Inactive",
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
