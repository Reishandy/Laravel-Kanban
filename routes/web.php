<?php

use App\Http\Controllers\KanbanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
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

Route::controller(TaskController::class)->group(function () {
    Route::post('/kanban/{kanban:code}/task', 'store')
        ->middleware(['auth', 'verified'])
        ->can('create', Task::class);

    Route::patch('/kanban/{kanban:code}/task/{task}', 'update')
        ->middleware(['auth', 'verified'])
        ->can('update', 'task');

    Route::delete('/kanban/{kanban:code}/task/{task}', 'destroy')
        ->middleware(['auth', 'verified'])
        ->can('delete', 'task');

    Route::patch('/kanban/{kanban:code}/task/{task}/move', 'move')
        ->middleware(['auth', 'verified'])
        ->can('update', 'task')
        ->name('task.move');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
