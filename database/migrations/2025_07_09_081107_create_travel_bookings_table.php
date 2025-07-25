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
        Schema::create('travel_bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('country');
            $table->string('city');
            $table->date('reservation_date');

            $table->enum('transport_type_to_mecca', ['bari', 'jawi']);
            $table->enum('transport_type_to_madina', ['bari', 'jawi']);

            $table->foreignId('transport_id_to_mecca')->nullable()->constrained('transports')->nullOnDelete();
            $table->foreignId('air_transport_id_to_mecca')->nullable()->constrained('air_transports')->nullOnDelete();

            $table->foreignId('transport_id_to_madina')->nullable()->constrained('transports')->nullOnDelete();
            $table->foreignId('air_transport_id_to_madina')->nullable()->constrained('air_transports')->nullOnDelete();

            $table->foreignId('hotel_id_mecca')->nullable()->constrained('hotels')->nullOnDelete();
            $table->foreignId('hotel_id_madina')->nullable()->constrained('hotels')->nullOnDelete();
            $table->decimal('total_price', 10, 2)->default(0);

            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->nullable()->default('pending');
            $table->enum('method_paid', ['cash', 'credit_card'])->nullable();
            $table->string('payment_status')->default('pending');

            $table->string('payment_reference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_bookings');
    }
};
