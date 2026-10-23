<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('notes.index');
});

Route::middleware('guest')->group(function () {
    
    //AUTH ROUTES
    Route::get('/login',             [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',            [AuthController::class, 'login']);

    Route::get('/register',          [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',         [AuthController::class, 'register']);
    
});

Route::middleware('auth')->group(function () {
    
    Route::post('/logout',           [AuthController::class, 'logout'])->name('logout');
    
    //NOTE ROUTES
    Route::get('/notes',             [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create',      [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes',            [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}',      [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}',   [NoteController::class, 'destroy'])->name('notes.destroy');
    
});