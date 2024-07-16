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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->bigInteger('age');
            $table->string('enrollment_status')->comment('1 = Enrolled, 2 = Not Enrolled');
            $table->string('grade_school')->comment('1 = 1st year high school, 2 = 2nd year high school, 3 = 3rd year high school, 4 = 4th year high school');
            $table->string('student_status')->comment('1 = Old Student, 2 = New Student, 3 = Transferee');
            $table->string('student_type')->comment('1 = STE, 2 = Regular');
            $table->string('student_section')->comment('1 = Absolute, 2 = Bright, 3 = Creative, 4 = Dynamic, 5 = Ethical, 6 = Flexible, 7 = Gracious, 8 = Honest, 9 = Immaculate, 10 - Just');
            $table->datetime('school_year_start');
            $table->datetime('school_year_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
