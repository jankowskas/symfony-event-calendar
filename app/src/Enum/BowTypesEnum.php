<?php

namespace App\Enum;

enum BowTypesEnum: string
{
    case COMPOUND_TARGET = 'Compound Target';
    case COMPOUND_HUNTING = 'Compound Hunting';
    case COMPOUND_BAREBOW = 'Compound Barebow';
    case OLYMPIC_RECURVE = 'Olympic Recurve';
    case BAREBOW = 'Barebow';
    case TRADITIONAL_RECURVE = 'Traditional Recurve';
    case BOWHUNTER_RECURVE = 'Bowhunter Recurve';
    case LONGBOW = 'Longbow';
    case HISTORICAL = 'Historical';
    case HORSEBOW = 'Horsebow';
}
