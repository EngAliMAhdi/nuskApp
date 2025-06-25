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
        Schema::create('air_transports', function (Blueprint $table) {
            $table->id();
            $table->string('airplane');
            $table->string('flight_number')->unique();
            $table->integer('available_seats');
            $table->integer('booked_seats')->default(0);
            $table->string('airplane_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('air_transports');
    }
};
