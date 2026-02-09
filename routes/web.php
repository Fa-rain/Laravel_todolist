<?php

use App\Http\Controllers\AuthManager;
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

// To Do List
// Route::get('/todolist', [ToDoListController::class, 'index']); // show data
// Route::get('/todolist/create', [ToDoListController::class, 'create']); // show add form
// Route::post('/todolist', [ToDoListController::class, 'store']);
// Route::delete('/todolist/{id_todolist}', [ToDoListController::class, 'destroy']);
// Route::get('/todolist/{id_todolist}/edit', [ToDoListController::class, 'edit']);
// Route::put('/todolist/{id_todolist}', [ToDoListController::class, 'update']);

// To Do List
Route::middleware('auth')->group(function (){
    Route::get('/', [ToDoListController::class, 'index']);
    Route::get('/todolist', [ToDoListController::class, 'index'])->name('todolist'); // show data
    Route::get('/todolist/create', [ToDoListController::class, 'create']); // show add form
    Route::post('/todolist', [ToDoListController::class, 'store']);
    Route::delete('/todolist/{id_todolist}', [ToDoListController::class, 'destroy']);
    Route::get('/todolist/{id_todolist}/edit', [ToDoListController::class, 'edit']);
    Route::put('/todolist/{id_todolist}', [ToDoListController::class, 'update']);
});

// Profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

