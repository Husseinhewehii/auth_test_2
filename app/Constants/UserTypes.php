<?php

namespace App\Constants;

final class UserTypes
{
    const ADMIN = 1;
    const NORMAL = 2;

    public static function getList()
    {
        return [
            UserTypes::ADMIN => 'admins',
            UserTypes::NORMAL => 'normals',
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
