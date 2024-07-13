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
            $table->string('name');
            $table->biginteger('gender_id')->unsigned();
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
