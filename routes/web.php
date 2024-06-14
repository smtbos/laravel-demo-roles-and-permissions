<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('notes')->name('notes.')->controller(NoteController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('can:note-read');
        Route::get('/create', 'create')->name('create')->middleware('can:note-create');
        Route::post('/', 'store')->name('store')->middleware('can:note-create');
        Route::get('/{note}/edit', 'edit')->name('edit')->middleware('can:note-update');
        Route::put('/{note}', 'update')->name('update')->middleware('can:note-update');
        Route::delete('/{note}', 'destroy')->name('destroy')->middleware('can:note-delete');
    });
});

require __DIR__ . '/auth.php';
