<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;
use Wame\LaravelNovaUnit\Models\UnitGroup;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('unit_groups', function (Blueprint $table): void {
            if ('ulid' === Builder::$defaultMorphKeyType) {
                $table->ulid('id')->primary();
            } elseif ('uuid' === Builder::$defaultMorphKeyType) {
                $table->uuid('id')->primary();
            } else {
                $table->id('id')->primary();
            }

            $table->string('title', 100);
            $table->string('slug', 100);
            $table->boolean('status')->default(UnitGroup::STATUS_ENABLED);
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_groups');
    }
};
