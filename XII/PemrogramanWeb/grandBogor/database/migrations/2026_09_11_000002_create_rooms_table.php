<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_category_id')->constrained('room_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('location');
            $table->unsignedInteger('capacity_adults')->default(2);
            $table->unsignedInteger('capacity_children')->default(0);
            $table->decimal('price_per_night', 12, 2);
            $table->string('price_note')->nullable();
            $table->unsignedInteger('area_sqm')->nullable();
            $table->json('facilities')->nullable();
            $table->string('status')->default('tersedia');
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
