<?php

use App\Models\Task;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdmin;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

//Cách 1 :
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')
    ->middleware('admin');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')
    ->middleware('admin');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//Cách 2:
Route::resource('/tasks', TaskController::class);