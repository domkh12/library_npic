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
        Schema::create('attendents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');   
            $table->foreign('student_id')->references('id')->on('student');
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('year');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subject');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payment');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('class');
            // time in and time out
            $table->time('time_in');
            $table->time('time_out');
            $table->date('date');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendents');
    }
};
