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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم السائق
            $table->string('companion_name')->nullable(); // اسم المرافق
            $table->string('guide_name')->nullable(); // اسم المرشد
            $table->unsignedInteger('age')->nullable(); // العمر
            $table->string('address')->nullable(); // العنوان
            $table->string('license_file'); // ملف رخصة القيادة (مسار الملف)
            $table->string('phone'); // رقم الهاتف
            $table->string('companion_phone')->nullable(); // رقم هاتف المرافق
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
