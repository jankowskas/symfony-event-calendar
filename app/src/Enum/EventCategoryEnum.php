<?php

namespace App\Enum;

class EventCategoryEnum
{
    public const WA = 'World Archery';
    public const IFAA = 'International Field Archery Association';
    public const CUSTOM = 'Custom';

    public static function getChoices(): array
    {
        return [
            self::WA => self::WA,
            self::IFAA => self::IFAA,
            self::CUSTOM => self::CUSTOM,
        ];
    }
}
