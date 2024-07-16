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
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('middle_name')->nullable();
            $table->string('name_extn')->nullable()->comment('1 = JR, 2 = SR');
            $table->string('sex')->comment('1 = Male, 2 = Female');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('middle_name')->nullable();
            $table->string('name_extn')->nullable()->comment('1 = JR, 2 = SR');
            $table->string('sex')->comment('1 = Male, 2 = Female');
        });
    }
};
