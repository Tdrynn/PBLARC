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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // Camping, Picnic, Campervan
            $table->string('slug')->unique();      // camping, picnic
            $table->enum('type', ['camping','picnic','campervan','groupevent']);
            $table->integer('capacity')->default(0);
            $table->boolean('block_other_packages')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
