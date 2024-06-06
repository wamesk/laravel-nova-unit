<?php

namespace Wame\LaravelNovaUnit\Enums\Traits;

trait HasOptions
{
    public static function selectOptions(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->title();
        }

        return $options;
    }
}
