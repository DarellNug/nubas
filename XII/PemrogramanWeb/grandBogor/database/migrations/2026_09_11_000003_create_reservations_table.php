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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_code')->unique();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone');
            $table->string('id_type')->default('KTP');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->unsignedInteger('total_nights')->default(1);
            $table->unsignedInteger('total_adults')->default(2);
            $table->unsignedInteger('total_children')->default(0);
            $table->json('special_requests')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->string('payment_status')->default('pending');
            $table->string('reservation_status')->default('confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
