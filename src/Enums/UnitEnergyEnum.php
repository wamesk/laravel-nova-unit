<?php

namespace Wame\LaravelNovaUnit\Enums;

use SaKanjo\EasyEnum;
use Wame\LaravelNovaUnit\Enums\Traits\HasOptions;
use Wame\LaravelNovaUnit\Enums\Traits\HasTitle;

enum UnitEnergyEnum: string
{
    use EasyEnum;
    use HasTitle;
    use HasOptions;

    case MEGAWATT_HOUR = 'megawatt_hour';
    case GIGA_JOULES = 'giga_joules';
    case KILOWATT_HOUR = 'kilowatt_hour';
    case MEGA_JOULE = 'mega_joule';
    case KILO_CALORIES = 'kilo_calories';
    case KILO_JOULE = 'kilo_joule';
    case CALORIE = 'calorie';
    case JOULE = 'joule';

    public static function basic(): UnitEnergyEnum
    {
        return self::KILOWATT_HOUR;
    }

    public function coefficient(): float|int
    {
        return match ($this) {
            self::MEGAWATT_HOUR => 0.001,
            self::GIGA_JOULES => 0.0036,
            self::KILOWATT_HOUR => 1,
            self::MEGA_JOULE => 3.6,
            self::KILO_CALORIES => 860.2151,
            self::KILO_JOULE => 3600,
            self::CALORIE => 860215.0538,
            self::JOULE => 3600000,
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::MEGAWATT_HOUR => 'MWh',
            self::GIGA_JOULES => 'GJ',
            self::KILOWATT_HOUR => 'kWh',
            self::MEGA_JOULE => 'MJ',
            self::KILO_CALORIES => 'kcal',
            self::KILO_JOULE => 'kJ',
            self::CALORIE => 'cal',
            self::JOULE => 'J',
        };
    }

    public function groupTitle(): string
    {
        return __('unit::unit.energy');
    }
}
