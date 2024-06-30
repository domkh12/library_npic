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