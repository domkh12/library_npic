<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/testuser',function(){
    $user = DB::table('users')->where('id', 1)->first();
    dd($user);
});
