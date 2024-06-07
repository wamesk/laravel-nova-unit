<?php

namespace Wame\LaravelNovaUnit\Enums;

use SaKanjo\EasyEnum;
use Wame\LaravelNovaUnit\Enums\Traits\HasOptions;
use Wame\LaravelNovaUnit\Enums\Traits\HasTitle;

enum UnitVolumeEnum: string
{
    use EasyEnum;
    use HasTitle;
    use HasOptions;

    case MILLILITER = 'milliliter';
    case CENTILITER = 'centiliter';
    case DECILITER = 'deciliter';
    case LITER = 'liter';
    case GALLON_US = 'gallon_us';
    case GALLON_UK = 'gallon_uk';
    case HECTO_LITER = 'hecto_liter';
    case BARREL = 'barrel';
    case CUBIC_METRE = 'cubic_metre';

    public static function basic(): UnitVolumeEnum
    {
        return self::MILLILITER;
    }

    public function coefficient(): string
    {
        return match ($this) {
            self::MILLILITER => 1,
            self::CENTILITER => 10,
            self::DECILITER => 100,
            self::LITER => 1000,
            self::GALLON_US => 3785,
            self::GALLON_UK => 4546,
            self::HECTO_LITER => 100000,
            self::BARREL => 158987,
            self::CUBIC_METRE => 1000000,
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::MILLILITER => 'ml',
            self::CENTILITER => 'cl',
            self::DECILITER => 'dl',
            self::LITER => 'l',
            self::GALLON_US, self::GALLON_UK => 'gal',
            self::HECTO_LITER => 'hl',
            self::BARREL => 'bl',
            self::CUBIC_METRE => 'm³',
        };
    }

    public function groupTitle(): string
    {
        return __('unit::unit.volume');
    }
}
