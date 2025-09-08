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
        Schema::create('technologies', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->string('name');
    $table->string('icon'); // Nama ikon FontAwesome
    $table->string('category'); // frontend, backend, tool, dll
    $table->boolean('is_checked')->default(false); // Untuk efek toggle di scrolling tech
    $table->integer('order')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
