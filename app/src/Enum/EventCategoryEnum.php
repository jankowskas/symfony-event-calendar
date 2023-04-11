<?php

namespace App\Enum;

class EventCategoryEnum
{
    public const WA = 'World Archery';
    public const IFAA = 'International Field Archery Assiciation';

    public static function getChoices(): array
    {
        return [
            self::WA => self::WA,
            self::IFAA => self::IFAA,
        ];
    }
}
