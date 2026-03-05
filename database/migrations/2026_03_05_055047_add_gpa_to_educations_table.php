<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('educations', function (Blueprint $table) {
            // decimal(5,2) → supports 0.00 – 999.99, covers both 4.0 and 100-point scales
            $table->decimal('gpa', 5, 2)->nullable()->after('field_of_study');
            $table->decimal('gpa_max', 5, 2)->nullable()->default(4.00)->after('gpa');
        });
    }

    public function down(): void
    {
        Schema::table('educations', function (Blueprint $table) {
            $table->dropColumn(['gpa', 'gpa_max']);
        });
    }
};
