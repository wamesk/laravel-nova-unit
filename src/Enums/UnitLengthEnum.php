<?php

namespace Wame\LaravelNovaUnit\Enums;

use SaKanjo\EasyEnum;
use Wame\LaravelNovaUnit\Enums\Traits\HasOptions;
use Wame\LaravelNovaUnit\Enums\Traits\HasTitle;

enum UnitLengthEnum: string
{
    use EasyEnum;
    use HasTitle;
    use HasOptions;

    case MILLIMETER = 'millimeter';
    case CENTIMETER = 'centimeter';
    case INCH = 'inch';
    case DECIMETER = 'decimeter';
    case FOOT = 'foot';
    case YARD = 'yard';
    case METER = 'meter';
    case KILOMETER = 'kilometer';
    case MILE = 'mile';

    public function coefficient(): float|int
    {
        return match ($this) {
            self::MILLIMETER => 1,
            self::CENTIMETER => 10,
            self::INCH => 25.4,
            self::DECIMETER => 100,
            self::FOOT => 304.8,
            self::YARD => 914.4,
            self::METER => 1000,
            self::KILOMETER => 1000000,
            self::MILE => 1609340,
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::MILLIMETER => 'mm',
            self::CENTIMETER => 'cm',
            self::INCH => 'in',
            self::DECIMETER => 'dm',
            self::FOOT => 'ft',
            self::YARD => 'yd',
            self::METER => 'm',
            self::KILOMETER => 'km',
            self::MILE => 'ml',
        };
    }
}
