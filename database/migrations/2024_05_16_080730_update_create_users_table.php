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
        Schema::table('users', function (Blueprint $table) {
            $table->string('student_id')->nullable();
            $table->string('user_access')->comment('1 = Admin, 2 = Faculty, 3 = Student');
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
