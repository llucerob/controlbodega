<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedidasController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ProveedoresController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//crud medidas

Route::get('crear-medida', [MedidasController::class, 'create'])->name('medidas.create');
Route::post('store-medida', [MedidasController::class, 'store'])->name('medidas.store');
Route::get('medidas', [MedidasController::class, 'index'])->name('medidas.index');
Route::get('destroy-medidas/{id}', [MedidasController::class, 'destroy'])->name('medidas.destroy');  


//crud provedores
route::get('listar-provedores', [ProveedoresController::class, 'index'])->name('proveedores.index');
route::get('ajax-proveedores', [ProveedoresController::class, 'ajaxproveedores'])->name('proveedores.ajax');
route::get('crear-proveedor', [ProveedoresController::class, 'create'])->name('proveedores.create');
route::post('store-proveedor', [ProveedoresController::class, 'store'])->name('proveedores.store');
route::get('editar-proveedor/{id}', [ProveedoresController::class, 'edit'])->name('proveedores.edit');
route::get('destroy-proveedor/{id}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');



require __DIR__.'/auth.php';
