<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

// Auth
Route::get('/login', [AuthManager::class, 'login'])
    ->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])
    ->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])
    ->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])
    ->name('register.post');
Route::post('/logout', [AuthManager::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// To Do List
// Route::get('/todolist', [ToDoListController::class, 'index']); // show data
// Route::get('/todolist/create', [ToDoListController::class, 'create']); // show add form
// Route::post('/todolist', [ToDoListController::class, 'store']);
// Route::delete('/todolist/{id_todolist}', [ToDoListController::class, 'destroy']);
// Route::get('/todolist/{id_todolist}/edit', [ToDoListController::class, 'edit']);
// Route::put('/todolist/{id_todolist}', [ToDoListController::class, 'update']);

// To Do List
Route::middleware(['auth'])->group(function (){
    Route::get('/', [ToDoListController::class, 'index']);
    Route::get('/todolist', [ToDoListController::class, 'index'])->name('todolist'); // show data
    Route::get('/todolist/create', [ToDoListController::class, 'create']); // show add form
    Route::post('/todolist', [ToDoListController::class, 'store']);
    Route::delete('/todolist/{id_todolist}', [ToDoListController::class, 'destroy']);
    Route::get('/todolist/{id_todolist}/edit', [ToDoListController::class, 'edit']);
    Route::put('/todolist/{id_todolist}', [ToDoListController::class, 'update']);
    Route::post('/todolist/{id_todolist}/status', [ToDoListController::class, 'status']);
});

// Profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Label
Route::middleware(['auth'])->group(function (){
    Route::get('/labels/create', [LabelController::class, 'create']);
    Route::post('/labels', [LabelController::class, 'store']);
    Route::get('/labels/{id_label}/edit', [LabelController::class, 'edit']);
    Route::put('/labels/{id_label}', [LabelController::class, 'update']);
    Route::delete('/labels/{id_label}', [LabelController::class, 'destroy']);
});

