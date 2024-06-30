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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('book_author');
            $table->string('book_publisher')->nullable();
            $table->string('book_isbn');
            $table->string('book_price');
            $table->string('book_description')->nullable();
            $table->string('book_category');
            // photo
            // subject and category are foreign keys
            
            $table->string('book_photo')->nullable();
            $table->string('book_quantity');
            $table->string('book_subject');
            $table->string('book_faculty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
