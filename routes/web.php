<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AuthController;

// Halaman awal redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// 🔹 Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');


// 🔹 Hanya bisa diakses kalau sudah login
Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('teams', TeamController::class);
});
