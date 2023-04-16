<?php

namespace App\Enum;

class DivisionEnum
{
    public const CW = 'CW';
    public const CM = 'CM';

    public static function getChoices(): array
    {
        return [
            self::CW => self::CW,
            self::CM => self::CM,
        ];
    }
}
