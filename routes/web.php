<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedidasController;
use App\Http\Controllers\MaterialesController;

use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\ProveedoresController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


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
route::post('update-proveedor/{id}', [ProveedoresController::class, 'update'])->name('proveedores.update');
route::get('destroy-proveedor/{id}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');


//materiales

route::get('listar-materiales', [MaterialesController::class, 'index'])->name('materiales.index');
route::get('ajax-materiales', [MaterialesController::class, 'ajaxmateriales'])->name('materiales.ajax');
route::get('crear-material', [MaterialesController::class, 'create'])->name('materiales.create');
route::post('store-material', [MaterialesController::class, 'store'])->name('materiales.store');
route::get('editar-material/{id}', [MaterialesController::class, 'edit'])->name('materiales.edit');
route::post('update-material/{id}', [MaterialesController::class, 'update'])->name('materiales.update');    
route::get('destroy-material/{id}', [MaterialesController::class, 'destroy'])->name('materiales.destroy');
route::get('comprar-material/{id}', [MaterialesController::class, 'vistacompra'])->name('materiales.comprar');
route::post('setcompra-material/{id}', [MaterialesController::class, 'agregarcompra'])->name('materiales.setcompra');
route::get('compras-material/{id}', [MaterialesController::class, 'listarcompras'])->name('materiales.listacompras');
route::get('ajax-comprasmaterial/{id}', [MaterialesController::class, 'ajaxcomprasmaterial'])->name('materiales.ajaxcomprasmaterial');
route::get('consultacompras-material', [MaterialesController::class, 'consultacompras'])->name('materiales.consultacompras');
route::post('consultar-comprafecha', [MaterialesController::class, 'consultarcomprafecha'])->name('materiales.consultarcomprafecha');
route::get('reservados-materiales', [MaterialesController::class, 'reservados'])->name('materiales.reservados');
route::get('reservados-entrega/{id}', [MaterialesController::class, 'reservadosentrega'])->name('materiales.reservadosentrega');
route::get('reservar-material/{id}', [MaterialesController::class, 'reservar'])->name('materiales.reservar');
route::post('reservar2-material/{id}', [MaterialesController::class, 'reservar2'])->name('materiales.reservar2');
route::post('setreservar-material/{id}', [MaterialesController::class, 'setreservar'])->name('materiales.setreservar');
route::get('consulta-material/{id}', [MaterialesController::class, 'consultamaterial'])->name('materiales.consulta');
route::get('devolucion-material/{id}', [MaterialesController::class, 'devolucionmaterial'])->name('materiales.devolucion');
route::post('setdevolucion-material', [MaterialesController::class, 'setdevolucion'])->name('materiales.setdevolucion');
route::get('materiales-informe/{id}', [MaterialesController::class, 'informe'])->name('materiales.informe'); 
route::get('materiales-recibirdevolucion', [MaterialesController::class, 'recibirdevolucion'])->name('materiales.recibirdevolucion');
route::get('materiales-recibedevolucion/{id}', [MaterialesController::class, 'recibedevolucion'])->name('materiales.recibedevolucion');





//actividades

route::get('listar-actividades', [ActividadesController::class, 'index'])->name('actividades.index');
route::get('ajax-actividades', [ActividadesController::class, 'ajaxactividades'])->name('actividades.ajax');
route::get('crear-actividad', [ActividadesController::class, 'create'])->name('actividades.create');
route::post('store-actividad', [ActividadesController::class, 'store'])->name('actividades.store');
route::get('editar-actividad/{id}', [ActividadesController::class, 'edit'])->name('actividades.edit');
route::post('update-actividad/{id}', [ActividadesController::class, 'update'])->name('actividades.update');
route::get('ver-actividad/{id}', [ActividadesController::class, 'show'])->name('actividades.ver');
route::post('cerrar-actividad', [ActividadesController::class, 'cerrar'])->name('actividades.cerrar');
route::get('cerrados-actividades', [ActividadesController::class, 'trabajosrealizados'])->name('actividades.trabajosrealizados');
route::post('create2-actividad',[ActividadesController::class, 'create2'])->name('actividades.create2');
route::get('valorizar-actividad/{id}', [ActividadesController::class, 'valorizar'])->name('actividades.valorizar');
route::post('setcotizacion-actividad/{id}', [ActividadesController::class, 'setcotizar'])->name('actividades.cotizacion');
route::get('historial-actividad', [ActividadesController::class, 'historialvalorizacion'])->name('actividades.historial');
route::get('activar-actividad/{id}', [ActividadesController::class, 'activar'])->name('actividades.activar');


});
require __DIR__.'/auth.php';
