<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaUnit\Providers;

use Illuminate\Support\ServiceProvider;

final class LaravelNovaUnitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'unit');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
    }
}
