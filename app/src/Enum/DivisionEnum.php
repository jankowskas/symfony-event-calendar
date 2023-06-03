<?php

namespace App\Enum;

class DivisionEnum
{
    public const COMPOUND_TARGET = 'Compound Target';
    public const COMPOUND_HUNTING = 'Compound Hunting';
    public const COMPOUND_BAREBOW = 'Compound Barebow';
    public const OLYMPIC_RECURVE = 'Olympic Recurve';
    public const BAREBOW = 'Barebow';
    public const TRADITIONAL_RECURVE = 'Traditional Recurve';
    public const BOWHUNTER_RECURVE = 'Bowhunter Recurve';
    public const LONGBOW = 'Longbow';
    public const HISTORICAL = 'Historical';

    public static function getChoices(): array
    {
        return [
            self::COMPOUND_TARGET => self::COMPOUND_TARGET,
            self::COMPOUND_HUNTING => self::COMPOUND_HUNTING,
            self::COMPOUND_BAREBOW => self::COMPOUND_BAREBOW,
            self::OLYMPIC_RECURVE => self::OLYMPIC_RECURVE,
            self::BAREBOW => self::BAREBOW,
            self::TRADITIONAL_RECURVE => self::TRADITIONAL_RECURVE,
            self::BOWHUNTER_RECURVE => self::BOWHUNTER_RECURVE,
            self::LONGBOW => self::LONGBOW,
            self::HISTORICAL => self::HISTORICAL,
        ];
    }
}
