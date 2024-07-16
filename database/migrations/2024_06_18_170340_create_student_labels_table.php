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
        Schema::create('studentlabels', function (Blueprint $table) {
            $table->id();
            $table->string('student_status_id');
            $table->string('student_status_label')->comment('1 = New Student, 2 = Old Student, 3 = Transferee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentlabels');
    }
};
