<?php

namespace App\Enum;

enum BowClassesEnum: string
{
    case MASTER = 'Mastersi';
    case ADULT = 'Dorośli';
    case TEEN = 'Nastoletni';
    case CHILDREN = 'Dzieci';

    case WA_MASTER = 'Mastersi(50+)';
    case WA_SENIOR = 'Dorośli(21+)';
    case WA_U_24 = 'Młodzieżowcy(21-23)';
    case WA_U_21 = 'Juniorzy(18-20)';
    case WA_U_18 = 'Juniorzy młodsi(15-17)';
    case WA_U_15 = 'Młodzicy(12-14)';
    case WA_CHILDREN = 'Dzieci(u12)';

    case IFAA_CHILDREN = 'Dzieci(u13)';
    case IFAA_JUNIOR = 'Juniorzy(13-16)';
    case IFAA_YOUNG_ADULT = 'Juniorzy(17-20)';
    case IFAA_ADULT = 'Dorośli(21-54)';
    case IFAA_SENIOR = 'Seniorzy(65+)';
    case IFAA_VETERAN = 'Weterani(55+)';
}

/*
 * Na podstawie:
 * miscellaneous/2021-Book-of-Rules.pdf
 * miscellaneous/Komunikat-Regulaminowy-PZLucz-2021.pdf
 * https://www.worldarchery.sport/rulebook/article/15
 */
