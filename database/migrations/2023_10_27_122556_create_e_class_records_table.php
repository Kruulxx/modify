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
        Schema::create('e_class_records', function (Blueprint $table) {
            $table->id();
            $table->string('subject_load_id');
            $table->string('school_year_id');
            $table->string('class_id');
            $table->string('subject_id');
            $table->string('semester');
            $table->json('student_grades')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_class_records');
    }
};
