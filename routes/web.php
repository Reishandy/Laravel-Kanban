<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // TODO: Homepage
});

Route::get('/dashboard', function () {
    return view('welcome'); // TODO: Dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// TODO: Remove
Route::get('/dummy', function () {
    return view('auth.verify-email');
})->name('password.request');


require __DIR__.'/auth.php';

// TODO list:
//  - password reset (dashboard page)
//  - profile edit and delete (dashboard page)
//  - custom error
//  - custom pagination
