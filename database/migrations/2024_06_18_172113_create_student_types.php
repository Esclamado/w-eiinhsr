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
        Schema::create('studenttypes', function (Blueprint $table) {
            $table->id();
            $table->string('student_type_id');
            $table->string('student_type_label')->comment('1 = STE, 2 = Regular');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studenttypes');
    }
};
