<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', [ProductController::class, 'index'])
    ->middleware('can:manage-product')
    ->name('products.index');

// Rute untuk Penugasan Kelas B
Route::get('/products/export', [ProductController::class, 'export'])
    ->middleware('can:export-product')
    ->name('products.export');
    
Route::get('/about', [AboutController::class, 'index'])->name('about');

require __DIR__.'/auth.php';
