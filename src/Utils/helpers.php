<?php

use Wame\LaravelNovaUnit\Enums\UnitAreaEnum;
use Wame\LaravelNovaUnit\Enums\UnitEnergyEnum;
use Wame\LaravelNovaUnit\Enums\UnitInterface;
use Wame\LaravelNovaUnit\Enums\UnitLengthEnum;
use Wame\LaravelNovaUnit\Enums\UnitQuantityEnum;
use Wame\LaravelNovaUnit\Enums\UnitVolumeEnum;
use Wame\LaravelNovaUnit\Enums\UnitWeightEnum;

if (!function_exists('calculate_unit')) {
    /**
     * @throws Exception
     */
    function calculate_unit(float|int $value, UnitInterface $oldUnit, UnitInterface $newUnit): float|int {
        if (get_class($oldUnit) !== get_class($newUnit)) {
            throw new Exception('Units must be from the same group');
        }

        return ($value * $oldUnit->coefficient()) / $newUnit->coefficient();
    }
}

if (!function_exists('get_unit')) {
    /**
     * @throws Exception
     */
    function get_unit(string $value): null|UnitInterface {
        $enums = [
            UnitWeightEnum::class,
            UnitAreaEnum::class,
            UnitEnergyEnum::class,
            UnitLengthEnum::class,
            UnitQuantityEnum::class,
            UnitVolumeEnum::class,
        ];

        foreach ($enums as $enum) {
            $return = $enum::tryFrom($value);
            if (isset($return)) {
                return $return;
            }
        }

        return null;
    }
}
