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
        Schema::create('fourthyearuploadgrades', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('grade_school')->comment('1 = 1st YHS, 2 = 2nd YHS, 3 = 3rd YHS, 4 = 4th YHS');
            $table->string('grading_period')->comment('1 = 1st Quarter, 2 = 2nd Quarter, 3 = 3rd Quarter, 4 = 4th Quarter');
            $table->string('enrollment_status')->comment('1 = Enrolled, 2 = Not Enrolled');
            $table->string('school_year_start');
            $table->string('school_year_end');
            $table->string('calculus');
            $table->string('trigonometry');
            $table->string('physics');
            $table->string('filipino_four');
            $table->string('literature');
            $table->string('economics');
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fourthyearuploadgrades');
    }
};
