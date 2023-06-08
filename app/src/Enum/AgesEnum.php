<?php

namespace App\Enum;

class AgesEnum
{
    public const MASTER = 'Mastersi';
    public const ADULT = 'Dorośli';
    public const TEEN = 'Nastoletni';
    public const CHILDREN = 'Dzieci';

    public const WA_MASTER = 'Mastersi(50+)';
    public const WA_SENIOR = 'Dorośli(21+)';
    public const WA_U_24 = 'Młodzieżowcy(21-23)';
    public const WA_U_21 = 'Juniorzy(18-20)';
    public const WA_U_18 = 'Juniorzy młodsi(15-17)';
    public const WA_U_15 = 'Młodzicy(12-14)';
    public const WA_CHILDREN = 'Dzieci(u12)';

    public const IFAA_CHILDREN = 'Dzieci(u13)';
    public const IFAA_JUNIOR = 'Juniorzy(13-16)';
    public const IFAA_YOUNG_ADULT = 'Juniorzy(17-20)';
    public const IFAA_ADULT = 'Dorośli(21-54)';
    public const IFAA_SENIOR = 'Seniorzy(65+)';
    public const IFAA_VETERAN = 'Weterani(55+)';


    public static function getChoices(): array
    {
        return [
            self::MASTER => self::MASTER,
            self::ADULT => self::ADULT,
            self::TEEN => self::TEEN,
            self::CHILDREN => self::CHILDREN,
            self::WA_MASTER => self::WA_MASTER,
            self::WA_SENIOR => self::WA_SENIOR,
            self::WA_U_24 => self::WA_U_24,
            self::WA_U_21 => self::WA_U_21,
            self::WA_U_18 => self::WA_U_18,
            self::WA_U_15 => self::WA_U_15,
            self::WA_CHILDREN => self::WA_CHILDREN,
            self::IFAA_CHILDREN => self::IFAA_CHILDREN,
            self::IFAA_JUNIOR => self::IFAA_JUNIOR,
            self::IFAA_YOUNG_ADULT => self::IFAA_YOUNG_ADULT,
            self::IFAA_ADULT => self::IFAA_ADULT,
            self::IFAA_SENIOR => self::IFAA_SENIOR,
            self::IFAA_VETERAN => self::IFAA_VETERAN,
        ];
    }
}

/*
 * Na podstawie:
 * miscellaneous/2021-Book-of-Rules.pdf
 * miscellaneous/Komunikat-Regulaminowy-PZLucz-2021.pdf
 * https://www.worldarchery.sport/rulebook/article/15
 */