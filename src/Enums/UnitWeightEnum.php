<?php

namespace Wame\LaravelNovaUnit\Enums;

use SaKanjo\EasyEnum;
use Wame\LaravelNovaUnit\Enums\Traits\HasOptions;
use Wame\LaravelNovaUnit\Enums\Traits\HasTitle;

enum UnitWeightEnum: string
{
    use EasyEnum;
    use HasTitle;
    use HasOptions;

    case MILLIGRAM = 'milligram';
    case GRAM = 'gram';
    case DECA_GRAM = 'deca_gram';
    case LIBRA = 'libra';
    case KILOGRAM = 'kilogram';
    case TONNE = 'tonne';

    public function coefficient(): float|int
    {
        return match ($this) {
            self::MILLIGRAM => 0.001,
            self::GRAM => 1,
            self::DECA_GRAM => 10,
            self::LIBRA => 453.592,
            self::KILOGRAM => 1000,
            self::TONNE => 1000000,
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::MILLIGRAM => 'mg',
            self::GRAM => 'g',
            self::DECA_GRAM => 'dkg',
            self::LIBRA => 'lb',
            self::KILOGRAM => 'kg',
            self::TONNE => 't',
        };
    }
}
