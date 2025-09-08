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
        Schema::create('activity_logs', function (Blueprint $table) {
    $table->id();
    $table->string('log_name')->nullable();
    $table->text('description');
    $table->foreignId('subject_id')->nullable();
    $table->string('subject_type')->nullable();
    $table->foreignId('causer_id')->nullable()->constrained('users');
    $table->string('causer_type')->nullable();
    $table->json('properties')->nullable();
    $table->timestamps();
    
    $table->index(['subject_id', 'subject_type']);
    $table->index(['causer_id', 'causer_type']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                Schema::dropIfExists('activity_logs');

    }
};
