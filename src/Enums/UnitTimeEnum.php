<?php

namespace Wame\LaravelNovaUnit\Enums;

use Wame\LaravelNovaUnit\Enums\Traits\HasOptions;
use Wame\LaravelNovaUnit\Enums\Traits\HasTitle;

enum UnitTimeEnum: string
{
    use HasTitle;
    use HasOptions;

    case SECOND = 'second';
    case MINUTE = 'minute';
    case HOUR = 'hour';
    case MD = 'md';
    case DAY = 'day';
    case WEEK = 'week';

    public static function basic(): UnitWeightEnum
    {
        return self::HOUR;
    }

    public function coefficient(): float|int
    {
        return match ($this) {
            self::SECOND => 0.002777,
            self::MINUTE => 0.01667,
            self::HOUR => 1,
            self::MD => 8,
            self::DAY => 24,
            self::WEEK => 168,
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::SECOND => 's',
            self::MINUTE => 'm',
            self::HOUR => 'h',
            self::MD => 'MD',
            self::DAY => 'd',
            self::WEEK => 't',
        };
    }

    public function groupTitle(): string
    {
        return __('unit::unit.time');
    }
}
