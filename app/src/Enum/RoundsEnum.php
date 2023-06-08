<?php

namespace App\Enum;

class RoundsEnum
{
    public const WA_OUTDOOR_TARGET = 'Tarczowe(WA)';
    public const WA_INDOOR_TARGET = 'Halowe(WA)';
    public const WA_FIELD = 'Field(WA)';
    public const WA_3D = '3D(WA)';

    public const IFAA_FIELD = 'Field(IFAA)';
    public const IFAA_HUNTER = 'Hunter(IFAA)';
    public const IFAA_ANIMAL_MARKED = 'Animal marked(IFAA)';
    public const IFAA_ANIMAL_UNMARKED = 'Animal unmarked(IFAA)';
    public const IFAA_3D_HUNTING = '3-D Hunting(IFAA)';
    public const IFAA_3D_STANDARD = '3-D Standard(IFAA)';

    public const GENERAL_TARGET = 'Tarczowe';
    public const GENERAL_FIELD = 'Field';
    public const GENERAL_3D = '3D';
    public const GENERAL_INDOOR = 'Halowe';

    public static function getChoices(): array
    {
        return [
            self::WA_OUTDOOR_TARGET => self::WA_OUTDOOR_TARGET,
            self::WA_INDOOR_TARGET => self::WA_INDOOR_TARGET,
            self::WA_FIELD => self::WA_FIELD,
            self::WA_3D => self::WA_3D,
            self::IFAA_FIELD => self::IFAA_FIELD,
            self::IFAA_HUNTER => self::IFAA_HUNTER,
            self::IFAA_ANIMAL_MARKED => self::IFAA_ANIMAL_MARKED,
            self::IFAA_ANIMAL_UNMARKED => self::IFAA_ANIMAL_UNMARKED,
            self::IFAA_3D_HUNTING => self::IFAA_3D_HUNTING,
            self::IFAA_3D_STANDARD => self::IFAA_3D_STANDARD,
            self::GENERAL_TARGET => self::GENERAL_TARGET,
            self::GENERAL_FIELD => self::GENERAL_FIELD,
            self::GENERAL_3D => self::GENERAL_3D,
            self::GENERAL_INDOOR => self::GENERAL_INDOOR,
        ];
    }
}