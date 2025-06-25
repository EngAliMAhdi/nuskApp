<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->timestamps();
        });
        DB::table('abouts')->insert([
            [
                'question' => 'ما هي الخدمات التي تقدمونها في العمرة؟',
                'answer' => 'نقدم خدمات النقل، السكن، استخراج التأشيرات، وخدمة الإرشاد الكامل أثناء الرحلة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'هل تشمل خدماتكم الإقامة في مكة والمدينة؟',
                'answer' => 'نعم، تشمل خططنا إقامة مريحة في فنادق بمكة المكرمة والمدينة المنورة حسب الباقة المختارة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'كيف يمكنني الحجز لأداء العمرة؟',
                'answer' => 'يمكنك الحجز من خلال موقعنا الإلكتروني أو التواصل معنا عبر واتساب أو الهاتف.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'هل توجد باقات خاصة للعائلات؟',
                'answer' => 'نعم، نوفر باقات خاصة ومميزة للعائلات بأسعار تنافسية.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
