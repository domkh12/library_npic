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
            // borrower forienkey from user table
            $table->unsignedBigInteger('stu_id');
            $table->foreign('stu_id')->references('id')->on('student');            
            // book forienkey from book table
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('book');            
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            // status 1-pending, 2-issued, 3-returned
            $table->unsignedTinyInteger('status')->default(1);
            // fine amount for each day overdue
            $table->unsignedDecimal('fine', 10, 2)->default(0);
            // overdue days
            $table->unsignedSmallInteger('overdue_days')->default(0);
            // return status 1-pending, 2-accepted, 3-rejected
            $table->unsignedTinyInteger('return_status')->default(1);
            // comment for return status
            $table->string('return_comment')->nullable();
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status')->default(1);
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status_after_return')->default(1);
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status_after_return_admin')->default(1);
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status_after_return_librarian')->default(1);
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status_after_return_staff')->default(1);
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status_after_return_student')->default(1);
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status_after_return_teacher')->default(1);
            // book status after return 1-available, 2-borrowed
            $table->unsignedTinyInteger('book_status_after_return_visitor')->default(1);
            // book status after return 1-available, 2-borrowed
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
