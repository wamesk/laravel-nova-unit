<?php

declare(strict_types = 1);

namespace Wame\LaravelNovaLanguage;

use Illuminate\Support\ServiceProvider;

final class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Export model
            $model = app_path('Models/UnitGroup.php');
            if (!file_exists($model)) $this->createModel($model, 'UnitGroup');

            $model = app_path('Models/Unit.php');
            if (!file_exists($model)) $this->createModel($model, 'Unit');

            // Export Nova resource
            $this->publishes([__DIR__ . '/../app/Nova' => app_path('Nova')], ['nova', 'wame', 'unit']);

            // Export policy
            $this->publishes([__DIR__ . '/../app/Policies' => app_path('Policies')], ['policy', 'wame', 'unit']);

            // Export migration
            $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], ['migrations', 'wame', 'unit']);

            // Export seeder
            $this->publishes([__DIR__ . '/../database/seeders' => database_path('seeders')], ['seeders', 'wame', 'unit']);

            // Export lang
            $this->publishes([__DIR__ . '/../resources/lang' => resource_path('lang')], ['langs', 'wame', 'unit']);
        }
    }


    private function createModel($model, $name): void
    {
        $file = fopen($model, 'w');
        $idType = config('wame-commands.id-type');

        if ('ulid' === $idType) {
            $use = "use Illuminate\Database\Eloquent\Concerns\HasUlids;\n";
            $use2 = "    use HasUlids;\n";
        } elseif ('uuid' === $idType) {
            $use = "use Illuminate\Database\Eloquent\Concerns\HasUuids;\n";
            $use2 = "    use HasUuids;\n";
        } else {
            $use = '';
            $use2 = '';
        }

        $lines = [
            "<?php \n",
            "\n",
            "namespace App\Models;\n",
            "\n",
            $use,
            "\n",
            "class " . $name . " extends \Wame\LaravelNovaLanguage\Models\\" . $name . "\n",
            "{\n",
            $use2,
            "\n",
            "}\n",
            "\n",
        ];

        fwrite($file, implode('', $lines));
        fclose($file);
    }
}
