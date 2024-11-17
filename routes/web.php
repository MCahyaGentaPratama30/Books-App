<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/test', 'test');
Route::view('/test2/{id}', 'test2');
