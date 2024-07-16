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
        Schema::create('firstyearuploadgrades', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('grade_school');
            $table->string('grading_period');
            $table->string('enrollment_status');
            $table->string('school_year_start');
            $table->string('school_year_end');
            $table->string('algebra_one');
            $table->string('english_one');
            $table->string('filipino_one');
            $table->string('philippine_history');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firstyearuploadgrades');
    }
};
