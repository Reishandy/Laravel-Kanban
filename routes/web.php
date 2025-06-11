<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // TODO: Homepage
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// TODO: Remove
Route::get('/profile', function () {
    return view('profile');
})->name('profile');


require __DIR__.'/auth.php';

// TODO list:
//  - password reset (dashboard page)
//  - profile edit and delete (dashboard page)
//  - custom error
//  - custom pagination
//  - icon
//  - laravel starterkit own (remove git and configure default first)
