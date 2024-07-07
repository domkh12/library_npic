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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('dob')->nullable();  
            $table->string('faculty')->nullable();
            $table->string('major')->nullable();
            $table->string('borrow_qty')->nullable();            
            $table->string('status')->default('active'); 
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('year');                                      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
