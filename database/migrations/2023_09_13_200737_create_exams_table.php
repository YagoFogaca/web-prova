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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('points', 8, 2);
            $table->decimal('average', 8, 2);
            $table->string('access_code')->nullable();
            $table->string('matter')->nullable();
            $table->dateTime('access', 0)->nullable();
            $table->dateTime('access_termination', 0)->nullable();
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
