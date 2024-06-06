<?php

namespace Wame\LaravelNovaUnit\Enums;

use SaKanjo\EasyEnum;
use Wame\LaravelNovaUnit\Enums\Traits\HasOptions;
use Wame\LaravelNovaUnit\Enums\Traits\HasTitle;

enum UnitAreaEnum: string
{
    use EasyEnum;
    use HasTitle;
    use HasOptions;

    case SQUARE_MILLIMETER = 'square_millimeter';
    case SQUARE_CENTIMETER = 'square_centimeter';
    case SQUARE_INCH = 'square_inch';
    case SQUARE_DECIMETER = 'square_decimeter';
    case SQUARE_FOO = 'square_foo';
    case SQUARE_YARD = 'square_yard';
    case SQUARE_METER = 'square_meter';
    case ARE = 'are';
    case ACRE = 'acre';
    case HECTARE = 'hectare';
    case SQUARE_KILOMETER = 'square_kilometer';
    case SQUARE_MILE = 'square_mile';

    public function coefficient(): float|int
    {
        return match ($this) {
            self::SQUARE_MILLIMETER => 0.000001,
            self::SQUARE_CENTIMETER => 0.0001,
            self::SQUARE_INCH => 0.00064516,
            self::SQUARE_DECIMETER => 0.01,
            self::SQUARE_FOO => 0.092903,
            self::SQUARE_YARD => 0.836127,
            self::SQUARE_METER => 1,
            self::ARE => 100,
            self::ACRE => 4046.86,
            self::HECTARE => 10000,
            self::SQUARE_KILOMETER => 1000000,
            self::SQUARE_MILE => 2589990,
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::SQUARE_MILLIMETER => 'mm²',
            self::SQUARE_CENTIMETER => 'cm²',
            self::SQUARE_INCH => 'sq in',
            self::SQUARE_DECIMETER => 'dm²',
            self::SQUARE_FOO => 'sq ft',
            self::SQUARE_YARD => 'sq yd',
            self::SQUARE_METER => 'm²',
            self::ARE => 'a',
            self::ACRE => 'ac',
            self::HECTARE => 'ha',
            self::SQUARE_KILOMETER => 'km²',
            self::SQUARE_MILE => 'mile²',
        };
    }
}
