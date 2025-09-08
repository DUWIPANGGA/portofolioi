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
        Schema::create('custom_sections', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->string('section_name'); // about, skills, dll
    $table->string('title')->nullable();
    $table->text('content')->nullable();
    $table->integer('order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->json('custom_data')->nullable(); // Untuk data tambahan
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_sections');
    }
};
