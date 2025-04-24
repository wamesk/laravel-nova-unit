<?php

use Wame\LaravelNovaUnit\Enums\UnitAreaEnum;
use Wame\LaravelNovaUnit\Enums\UnitEnergyEnum;
use Wame\LaravelNovaUnit\Enums\UnitLengthEnum;
use Wame\LaravelNovaUnit\Enums\UnitQuantityEnum;
use Wame\LaravelNovaUnit\Enums\UnitTimeEnum;
use Wame\LaravelNovaUnit\Enums\UnitVolumeEnum;
use Wame\LaravelNovaUnit\Enums\UnitWeightEnum;

if (!function_exists('calculate_unit')) {
    /**
     * @throws Exception
     */
    function calculate_unit(
        float|int $value,
        UnitWeightEnum|UnitAreaEnum|UnitEnergyEnum|UnitLengthEnum|UnitQuantityEnum|UnitVolumeEnum $oldUnit,
        UnitWeightEnum|UnitAreaEnum|UnitEnergyEnum|UnitLengthEnum|UnitQuantityEnum|UnitVolumeEnum $newUnit,
    ): float|int {
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
    function get_unit(string $value): null|UnitWeightEnum|UnitAreaEnum|UnitEnergyEnum|UnitLengthEnum|UnitQuantityEnum|UnitVolumeEnum|UnitTimeEnum {
        $enums = [
            UnitWeightEnum::class,
            UnitAreaEnum::class,
            UnitEnergyEnum::class,
            UnitLengthEnum::class,
            UnitQuantityEnum::class,
            UnitVolumeEnum::class,
            UnitTimeEnum::class,
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
