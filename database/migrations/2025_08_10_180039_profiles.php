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
        Schema::create('profiles', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('title')->nullable(); // e.g. "Frontend Developer & UI Specialist"
    $table->text('bio')->nullable();
    $table->string('avatar')->nullable();
    $table->string('phone')->nullable();
    $table->string('location')->nullable();
    $table->string('cv_path')->nullable();
    $table->json('social_links')->nullable(); // JSON untuk menyimpan GitHub, LinkedIn, dll
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
