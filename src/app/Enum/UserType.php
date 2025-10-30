<?php

namespace App\Enum;

enum UserType
{
    case ADMIN;
    case NORMAL;
    case PUBLICIDAD;


    public static function createFromString(string $tipo):UserType{

        return match(strtolower($tipo)){
            'admin'=>UserType::ADMIN,
            'normal'=>UserType::NORMAL,
            'publicidad'=>UserType::PUBLICIDAD,
            default => UserType::NORMAL
        };





    }
}
