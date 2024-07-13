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
        Schema::create('borrowing', function (Blueprint $table) {
            $table->id();
        //    borrow date, return date, deadline date
        //    book_id, member_id, status (available, borrowed, returned)
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->date('deadline_date');
            // forein key with borrowdeatils
            $table->unsignedBigInteger('bd_id');
            $table->foreign('bd_id')->references('id')->on('borrowdeatils');
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing');
    }
};
