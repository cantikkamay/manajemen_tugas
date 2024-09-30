<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Halaman utama
Route::get('/', [TaskController::class, 'index'])->name('main'); // Mengarahkan ke index tugas

// Resource routes untuk tugas tanpa middleware autentikasi
Route::resource('tasks', TaskController::class);
Route::get('categories/{category}/tasks', [TaskController::class, 'tasksByCategory'])->name('categories.tasks');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

