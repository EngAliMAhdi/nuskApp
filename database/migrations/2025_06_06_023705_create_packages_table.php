<?php

use App\Models\Bouquet;
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
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignIdFor(Bouquet::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('place_departure')->nullable();
            $table->time('time_arrival')->nullable();
            $table->date('valid_from')->nullable();
            $table->time('time_departure')->nullable();
            $table->date('valid_to')->nullable();
            $table->time('time_return')->nullable();
            $table->string('transport_type')->nullable(); // App\Models\LandTransport or App\Models\AirTransport
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->integer('seats')->default(1);
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->string('distance_hotel')->nullable();
            $table->foreignId('room_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('duration_days')->default(1);
            $table->decimal('base_price', 10, 2);
            // Approval
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('stop_points')->nullable();
            $table->text('notes')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->text('rejection_reason')->nullable();
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
