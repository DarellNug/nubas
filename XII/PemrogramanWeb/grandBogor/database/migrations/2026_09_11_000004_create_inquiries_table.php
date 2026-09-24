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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('inquiry_code')->unique();
            $table->foreignId('room_id')->nullable()->constrained('rooms')->nullOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('inquiry_type')->default('Reservasi Kamar');
            $table->boolean('is_vip')->default(false);
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->unsignedInteger('guest_count')->nullable();
            $table->json('special_requests')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('baru');
            $table->unsignedInteger('response_time_minutes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
