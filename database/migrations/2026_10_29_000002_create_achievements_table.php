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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');                    // nama lomba
            $table->string('organizer')->nullable();    // penyelenggara
            $table->string('result')->nullable();       // peringkat: "Juara 1", "Finalis", "Medali Perak", dll
            $table->date('event_date')->nullable();     // tanggal lomba
            $table->text('description')->nullable();    // cerita/penjelasan lomba
            $table->string('certificate_image')->nullable(); // file sertifikat (1)
            $table->json('photos')->nullable();         // foto dokumentasi pas lomba (multi)
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
