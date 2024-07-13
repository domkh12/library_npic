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
            $table->unsignedBigInteger('stu_id');
            $table->foreign('stu_id')->references('id')->on('student');
            $table->unsignedBigInteger('fact_id');
            $table->foreign('fact_id')->references('id')->on('faculty'); 
            $table->unsignedBigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('gender');
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
