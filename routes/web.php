<?php

use App\Http\Controllers\KanbanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(KanbanController::class)->group(function () {
    Route::get('/dashboard', 'index')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
    Route::get('/kanban/{kanban:code}', 'show')
        ->middleware(['auth', 'verified'])
        ->name('kanban.show');
    Route::post('/join', 'join')
        ->middleware(['auth', 'verified'])
        ->name('kanban.join');
    Route::post('/kanban', 'store')
        ->middleware(['auth', 'verified'])
        ->name('kanban.store');
    Route::patch('/kanban/{kanban:code}', 'update')
        ->middleware(['auth', 'verified'])
        ->can('update', 'kanban');
    Route::delete('/kanban/{kanban:code}', 'destroy')
        ->middleware(['auth', 'verified'])
        ->can('delete', 'kanban');

});
Route::view('/kanban', 'kanban.show')->name('kanban');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
