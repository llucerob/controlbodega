<?php

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
});

//crud medidas

Route::get('crear-medida', [MedidasController::class, 'create'])->name('medidas.create');
Route::post('store-medida', [MedidasController::class, 'store'])->name('medidas.store');
Route::get('medidas', [MedidasController::class, 'index'])->name('medidas.index');
Route::delete('medidas/{id}', [MedidasController::class, 'destroy'])->name('medidas.destroy');  


//crud materiales



require __DIR__.'/auth.php';
