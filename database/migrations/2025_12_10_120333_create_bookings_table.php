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

            $table->foreignId('package_id')->constrained('packages'); // ✔ cukup ini 1 baris

            $table->string('name');
            $table->string('telephone'); // ✔ tidak unique
            $table->string('email')->nullable();
            $table->integer('participants');
            $table->integer('tent')->nullable();
            $table->date('checkin');
            $table->date('checkout');

            $table->integer('total_price')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
