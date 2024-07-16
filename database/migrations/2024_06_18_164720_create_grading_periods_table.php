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
        Schema::create('gradingperiods', function (Blueprint $table) {
            $table->id();
            $table->string('grading_period_id');
            $table->string('grading_period_label')->comment('1 = 1st Quarter, 2 = 2nd Quarter, 3 = 3rd Quarter, 4 = 4th Quarter');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradingperiods');
    }
};
