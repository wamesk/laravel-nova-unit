<?php

namespace Wame\LaravelNovaUnit\Enums;

use SaKanjo\EasyEnum;
use Wame\LaravelNovaUnit\Enums\Traits\HasOptions;
use Wame\LaravelNovaUnit\Enums\Traits\HasTitle;

enum UnitQuantityEnum: string
{
    use EasyEnum;
    use HasTitle;
    use HasOptions;

    case PACKAGING = 'packaging';
    case PIECE = 'piece';
    case PAIR = 'pair';
    case PALETTE = 'palette';

    public function coefficient(): int
    {
        return match ($this) {
            self::PACKAGING, self::PALETTE, self::PIECE, self::PAIR => 1,
        };
    }

    public function symbol(): string
    {
        return match ($this) {
            self::PACKAGING => 'bal.',
            self::PIECE => 'ks',
            self::PAIR => 'pár',
            self::PALETTE => 'pal.',
        };
    }
}
