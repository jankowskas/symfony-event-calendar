<?php

namespace App\Enum;

class AssociationsEnum
{
    public const WA = 'World Archery(WA)';
    public const IFAA = 'International Field Archery Association(IFAA)';
    public const CUSTOM = 'Bez asocjacji';

    public static function getChoices(): array
    {
        return [
            self::WA => self::WA,
            self::IFAA => self::IFAA,
            self::CUSTOM => self::CUSTOM,
        ];
    }
}
