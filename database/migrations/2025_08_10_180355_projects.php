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
        Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('description');
    $table->string('image_path');
    $table->string('featured_image_path')->nullable();
    $table->boolean('is_featured')->default(false);
    $table->date('project_date');
    $table->string('client')->nullable();
    $table->string('demo_url')->nullable();
    $table->string('case_study_url')->nullable();
    $table->json('technologies')->nullable(); // Array teknologi yang digunakan
    $table->integer('order')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
