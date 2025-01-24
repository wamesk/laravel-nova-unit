<?php

namespace Wame\LaravelNovaUnit\Casts;

use Exception;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Wame\LaravelNovaUnit\Enums\UnitAreaEnum;
use Wame\LaravelNovaUnit\Enums\UnitEnergyEnum;
use Wame\LaravelNovaUnit\Enums\UnitInterface;
use Wame\LaravelNovaUnit\Enums\UnitLengthEnum;
use Wame\LaravelNovaUnit\Enums\UnitQuantityEnum;
use Wame\LaravelNovaUnit\Enums\UnitVolumeEnum;
use Wame\LaravelNovaUnit\Enums\UnitWeightEnum;

class UnitCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param array<string, mixed> $attributes
     * @throws Exception
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): null|UnitInterface
    {
        if (is_null($value)) {
            return null;
        }

        return get_unit($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param array<string, mixed> $attributes
     * @throws Exception
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        if (is_null($value)) {
            return null;
        }

        if (is_string($value)) {
            return $value;
        }

        if (in_array(get_class($value), [
            UnitAreaEnum::class,
            UnitEnergyEnum::class,
            UnitLengthEnum::class,
            UnitQuantityEnum::class,
            UnitVolumeEnum::class,
            UnitWeightEnum::class,
        ])) {
            return $value->value;
        }

        throw new Exception('Invalid value type (must be string or unit enum)');
    }
}
