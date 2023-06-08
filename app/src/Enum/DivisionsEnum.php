<?php

namespace App\Enum;

enum DivisionsEnum: string
{
    case WA_RECURVE = 'Łucznictwo klasyczne(WA)';
    case WA_COMPOUND = 'Łucznictwo Bloczkowe(WA)';
    case WA_BAREBOW = 'Łucznictwo Barebow(WA)';
    case WA_TRADITIONAL = 'Łucznictwo Tradycyjne(WA)';
    case WA_LONGBOW = 'Łucznictwo Longbow(WA)';

    case IFAA_BAREBOW_RECURVE = 'Barebow Recurve(IFAA)';
    case IFAA_BAREBOW_COMPOUND = 'Barebow Compound(IFAA)';
    case IFAA_FU = 'Freestyle Unlimited(IFAA)';
    case IFAA_BU = 'Bowhunter Unlimited(IFAA)';
    case IFAA_BR = 'Bowhunter Recurve(IFAA)';
    case IFAA_BC = 'Bowhunter Compound(IFAA)';
    case IFAA_LONGBOW = 'Longbow(IFAA)';
    case IFAA_HISTORICAL = 'Historical(IFAA)';
    case IFAA_TR = 'Traditional Recurve(IFAA)';

    case HORSEBOW = 'Łucznictwo konne';
}
