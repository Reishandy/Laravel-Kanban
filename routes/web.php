<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// TODO: Remove
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dummy', function () {
    return view('welcome');
})->name('password.request');


require __DIR__.'/auth.php';

// TODO list:
//  - custom error
//  - custom pagination
