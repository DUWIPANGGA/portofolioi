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
        Schema::create('page_views', function (Blueprint $table) {
    $table->id();
    $table->string('url');
    $table->string('ip_address', 45);
    $table->string('user_agent')->nullable();
    $table->string('referrer')->nullable();
    $table->foreignId('user_id')->nullable()->constrained();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
