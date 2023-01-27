<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;
use Wame\LaravelNovaUnit\Models\Unit;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table): void {
            if ('ulid' === Builder::$defaultMorphKeyType) {
                $table->ulid('id')->primary();
                $table->foreignUlid('group_id')->nullable()->constrained('unit_groups')->cascadeOnUpdate()->cascadeOnDelete();
            } elseif ('uuid' === Builder::$defaultMorphKeyType) {
                $table->uuid('id')->primary();
                $table->foreignUuid('group_id')->nullable()->constrained('unit_groups')->cascadeOnUpdate()->cascadeOnDelete();
            } else {
                $table->id('id')->primary();
                $table->foreignId('group_id')->nullable()->constrained('unit_groups')->cascadeOnUpdate()->cascadeOnDelete();
            }
            $table->string('title', 50);
            $table->string('slug', 50);
            $table->string('symbol', 25);
            $table->float('coefficient', null, null)->default(1);
            $table->boolean('basic')->default(Unit::BASIC_DISABLED);
            $table->boolean('status')->default(Unit::STATUS_ENABLED);
            $table->unsignedTinyInteger('sort')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
