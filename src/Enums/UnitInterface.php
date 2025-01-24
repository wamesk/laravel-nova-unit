<?php

namespace Wame\LaravelNovaUnit\Enums;

interface UnitInterface
{
    public static function basic();

    public function coefficient(): float|int;

    public function symbol(): string;

    public function groupTitle(): string;
}