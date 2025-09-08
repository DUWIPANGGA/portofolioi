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
        Schema::create('theme_settings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->string('primary_color')->default('#3B82F6');
    $table->string('secondary_color')->default('#10B981');
    $table->string('dark_mode_primary')->default('#1E40AF');
    $table->string('dark_mode_secondary')->default('#047857');
    $table->string('font_family')->default('Inter');
    $table->boolean('enable_neumorphism')->default(true);
    $table->json('custom_css')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
