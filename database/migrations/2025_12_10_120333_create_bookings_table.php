<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_id')
                  ->constrained('packages')
                  ->cascadeOnDelete();
            $table->string('name');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->unsignedInteger('participants');
            $table->unsignedInteger('tent')->default(1);
            $table->date('checkin');
            $table->date('checkout');
            $table->unsignedInteger('total_price')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
