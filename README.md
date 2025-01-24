# Laravel Nova Units


## Requirements

- `"laravel/nova": "^4.0|^5.0"`


## Usage

```php
UnitSelect::make(__('product.field.weight_unit'), 'weight_unit')
    ->onlyGroups(UnitWeightEnum::class);

UnitSelect::make(__('product.field.weight_unit'), 'weight_unit')
    ->exceptGroups([
        UnitAreaEnum::class,
        UnitEnergyEnum::class,
        UnitWeightEnum::class,
        ...
    ]);
```

## Enums

| Enum | Description |
| --- | --- |
| `UnitAreaEnum` | Area units |
| `UnitEnergyEnum` | Energy units |
| `UnitLengthEnum` | Length units |
| `UnitQuantityEnum` | Quantity units |
| `UnitVolumeEnum` | Volume units |
| `UnitWeightEnum` | Weight units |
