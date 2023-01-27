<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;

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
            } elseif ('uuid' === Builder::$defaultMorphKeyType) {
                $table->uuid('id')->primary();
            } else {
                $table->id('id')->primary();
            }

            $table->foreignUlid('group_id')->constrained('unit_groups')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title', 50);
            $table->string('slug', 50);
            $table->string('symbol', 25);
            $table->float('coefficient', null, null)->default(1);
            $table->boolean('basic')->default(false);
            $table->boolean('status')->default(true);
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
