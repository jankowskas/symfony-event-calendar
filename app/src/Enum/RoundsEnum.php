<?php

namespace App\Enum;

enum RoundsEnum: string
{
    case WA_OUTDOOR_TARGET = 'Tarczowe(WA)';
    case WA_INDOOR_TARGET = 'Halowe(WA)';
    case WA_FIELD = 'Field(WA)';
    case WA_3D = '3D(WA)';

    case IFAA_FIELD = 'Field(IFAA)';
    case IFAA_HUNTER = 'Hunter(IFAA)';
    case IFAA_ANIMAL_MARKED = 'Animal marked(IFAA)';
    case IFAA_ANIMAL_UNMARKED = 'Animal unmarked(IFAA)';
    case IFAA_3D_HUNTING = '3-D Hunting(IFAA)';
    case IFAA_3D_STANDARD = '3-D Standard(IFAA)';

    case GENERAL_TARGET = 'Tarczowe';
    case GENERAL_FIELD = 'Field';
    case GENERAL_3D = '3D';
    case GENERAL_INDOOR = 'Halowe';
}
