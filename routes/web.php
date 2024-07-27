<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/testuser', function () {
    $user = DB::table('users')->where('id', 1)->first();
    dd($user);
});

use App\Http\Controllers\AttendentController;

// Route::get('/attendent', [AttendentController::class, 'index'])->name("attendent.list");
Route::get('/attendent', [AttendentController::class, 'index'])->name('attendent.list');
Route::get('/attendent/export', [AttendentController::class, 'export'])->name('attendent.export');

Route::get('/attendent/create', [AttendentController::class, 'create'])->name("attendent.create");

Route::post('/attendent', [AttendentController::class, 'store'])->name("attendent.store");

Route::get("/attendent/{attendentId}/edit", [AttendentController::class, 'edit'])->name('attendent.edit');

Route::put("/attendent/{attendentId}", [AttendentController::class, 'update'])->name('attendent.update');

Route::delete("/attendent/{attendentId}", [AttendentController::class, 'destroy'])->name('attendent.delete');

Route::get('/attendent/{attendentId}', [AttendentController::class, 'show'])->name("attendent.show");

Route::get('/attendent/student', [AttendentController::class, 'showStudentPage'])->name('attendent.student');
Route::get('/attendent/export', [AttendentController::class, 'export'])->name('attendent.export');

// Route::get('/attendent/scan', [AttendentController::class, 'scanPage'])->name('attendent.scanPage');
Route::post('/attendent/scan', [AttendentController::class, 'scanBarcode'])->name('attendent.scan');


use App\Http\Controllers\BookController;

Route::get('/book', [BookController::class, 'index'])->name("book.list");

Route::get('/book/create', [BookController::class, 'create'])->name("book.create");

Route::post('/book', [BookController::class, 'store'])->name("book.store");

Route::get("/book/{bookId}/edit", [BookController::class, 'edit'])->name('book.edit');

Route::put("/book/{bookId}", [BookController::class, 'update'])->name('book.update');

Route::delete("/book/{bookId}", [BookController::class, 'destroy'])->name('book.delete');

Route::get('/book/{cateId}', [BookController::class, 'show'])->name("book.show");

use App\Http\Controllers\StudentController;

Route::get('/student', [StudentController::class, 'index'])->name("student.list");

Route::get('/students', [StudentController::class, 'index'])->name('student.index');

Route::get('/student/create', [StudentController::class, 'create'])->name("student.create");

Route::post('/students', [StudentController::class, 'store'])->name('student.store');

Route::get("/student/{studentId}/edit", [StudentController::class, 'edit'])->name('student.edit');

Route::put("/student/{studentId}", [StudentController::class, 'update'])->name('student.update');

Route::delete("/student/{studentId}", [StudentController::class, 'destroy'])->name('student.delete');

Route::get('/student/{studentId}', [StudentController::class, 'show'])->name("student.show");

Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');
Route::get('student/{id}/barcode', [StudentController::class, 'generateBarcode'])->name('student.barcode');
Route::get('student/{id}/barcode/pdf', [StudentController::class, 'generatePDF'])->name('student.barcode.pdf');

use App\Http\Controllers\BorrowController;

Route::get('/borrow', [BorrowController::class, 'index'])->name("borrow.list");

Route::get('/borrow/create', [BorrowController::class, 'create'])->name("borrow.create");

Route::post('/borrow', [BorrowController::class, 'store'])->name("borrow.store");

Route::get("/borrow/{borrowId}/edit", [BorrowController::class, 'edit'])->name('borrow.edit');

Route::put("/borrow/{borrowId}", [BorrowController::class, 'update'])->name('borrow.update');

Route::delete("/borrow/{borrowId}", [BorrowController::class, 'destroy'])->name('borrow.delete');

Route::get('/borrow/{cateId}', [BorrowController::class, 'show'])->name("borrow.show");
