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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('telephone');
            $table->string('email')->nullable();

            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();

            $table->integer('participants')->default(1);
            $table->unsignedInteger('total_price')->default(0);

            // =====================
            // MIDTRANS FIELDS
            // =====================
            $table->string('order_id')->nullable()->unique();
            $table->string('snap_token')->nullable();
            $table->enum('payment_status', ['pending','paid','failed'])->default('pending');

            // BUSINESS STATUS
            $table->enum('status', ['pending','confirmed','cancelled'])->default('pending');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
