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
        Schema::table('firstyearuploadgrades', function (Blueprint $table) {
            $table->string('mathematics');
            $table->string('science');
            $table->string('english');
            $table->string('ap');
            $table->string('esp');
            $table->string('filipino');
            $table->string('tle');
            $table->string('music');
            $table->string('arts');
            $table->string('pe');
            $table->string('health');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
