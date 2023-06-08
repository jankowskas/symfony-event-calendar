<?php

namespace App\Enum;

class DivisionsEnum
{
    public const WA_RECURVE = 'Łucznictwo klasyczne(WA)';
    public const WA_COMPOUND = 'Łucznictwo Bloczkowe(WA)';
    public const WA_BAREBOW = 'Łucznictwo Barebow(WA)';
    public const WA_TRADITIONAL = 'Łucznictwo Tradycyjne(WA)';
    public const WA_LONGBOW = 'Łucznictwo Longbow(WA)';

    public const IFAA_BAREBOW_RECURVE = 'Barebow Recurve(IFAA)';
    public const IFAA_BAREBOW_COMPOUND = 'Barebow Compound(IFAA)';
    public const IFAA_FU = 'Freestyle Unlimited(IFAA)';
    public const IFAA_BU = 'Bowhunter Unlimited(IFAA)';
    public const IFAA_BR = 'Bowhunter Recurve(IFAA)';
    public const IFAA_BC = 'Bowhunter Compound(IFAA)';
    public const IFAA_LONGBOW = 'Longbow(IFAA)';
    public const IFAA_HISTORICAL = 'Historical(IFAA)';
    public const IFAA_TR = 'Traditional Recurve(IFAA)';

    public const HORSEBOW = 'Łucznictwo konne';

    public static function getChoices(): array
    {
        return [
            self::WA_RECURVE => self::WA_RECURVE,
            self::WA_COMPOUND => self::WA_COMPOUND,
            self::WA_BAREBOW => self::WA_BAREBOW,
            self::WA_TRADITIONAL => self::WA_TRADITIONAL,
            self::WA_LONGBOW => self::WA_LONGBOW,

            self::IFAA_BAREBOW_RECURVE => self::IFAA_BAREBOW_RECURVE,
            self::IFAA_BAREBOW_COMPOUND => self::IFAA_BAREBOW_COMPOUND,
            self::IFAA_FU => self::IFAA_FU,
            self::IFAA_BU => self::IFAA_BU,
            self::IFAA_BR => self::IFAA_BR,
            self::IFAA_BC => self::IFAA_BC,
            self::IFAA_LONGBOW => self::IFAA_LONGBOW,
            self::IFAA_HISTORICAL => self::IFAA_HISTORICAL,
            self::IFAA_TR => self::IFAA_TR,

            self::HORSEBOW => self::HORSEBOW,
        ];
    }
}
