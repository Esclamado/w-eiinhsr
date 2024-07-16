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
            $table->string('student_sections')->nullable()->comment('1 = Absolute, 2 = Bright, 3 = Creative, 4 = Dynamic, 5 = Ethical, 6 = Flexible, 7 = Gracious, 8 = Honest, 9 = Immaculate, 10 - Just');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('student_section')->nullable()->comment('1 = Absolute, 2 = Bright, 3 = Creative, 4 = Dynamic, 5 = Ethical, 6 = Flexible, 7 = Gracious, 8 = Honest, 9 = Immaculate, 10 - Just');
        });
    }
};
