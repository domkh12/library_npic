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

Route::get('/attendent', [AttendentController::class, 'index'])->name("attendent.list");

Route::get('/attendent/create', [AttendentController::class, 'create'])->name("attendent.create");

Route::post('/attendent', [AttendentController::class, 'store'])->name("attendent.store");

Route::get("/attendent/{attendentId}/edit", [AttendentController::class, 'edit'])->name('attendent.edit');

Route::put("/attendent/{attendentId}", [AttendentController::class, 'update'])->name('attendent.update');

Route::delete("/attendent/{attendentId}", [AttendentController::class, 'destroy'])->name('attendent.delete');

Route::get('/attendent/{cateId}', [AttendentController::class, 'show'])->name("attendent.show");

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

Route::get('/student/create', [StudentController::class, 'create'])->name("student.create");

Route::post('/student', [StudentController::class, 'store'])->name("student.store");

Route::get("/student/{studentId}/edit", [StudentController::class, 'edit'])->name('student.edit');

Route::put("/student/{studentId}", [StudentController::class, 'update'])->name('student.update');

Route::delete("/student/{studentId}", [StudentController::class, 'destroy'])->name('student.delete');

Route::get('/student/{cateId}', [StudentController::class, 'show'])->name("student.show");