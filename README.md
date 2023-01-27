# Laravel Nova 4 Units



## Requirements

- `laravel/nova: ^4.0`


## Installation

```bash
composer require wamesk/laravel-nova-unit
```

```bash
php artisan vendor:publish --provider="Wame\LaravelNovaUnit\PackageServiceProvider"
```

```bash
php artisan migrate
```

```bash
php artisan db:seed --class=UnitSeeder
```

Add Policy to `./app/Providers/AuthServiceProvider.php`
```php
protected $policies = [
    'App\Models\Unit' => 'App\Policies\UnitPolicy',
];
```

## Usage

```php
Select::make(__('product.field.unit'), 'unit_id')
    ->help(__('product.field.unit.help'))
    ->options(UnitController::selectOptions())
```
