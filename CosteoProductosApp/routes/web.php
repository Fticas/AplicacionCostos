<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(MagnitudController::class)->group(function(){
    Route::get('/magnitud/ver', 'index')->name('ver_magnitud');
    Route::get('/magnitud/crear', 'create')->name('crear_magnitud');
    Route::post('/magnitud/guardar', 'store')->name('guardar_magnitud');
    Route::get('/magnitud/{id}/editar', 'edit')->name('editar_magnitud');
    Route::put('/magnitud/{id}/actualizar', 'update')->name('actualizar_magnitud');
    Route::get('/magnitud/{id}/eliminar', 'destroy')->name('eliminar_magnitud');
});

Route::controller(UnidadMedidaController::class)->group(function(){
    Route::get('/unidadmedida/ver', 'index')->name('ver_unidad_medida');
    Route::get('/unidadmedida/crear', 'create')->name('crear_unidad_medida');
    Route::post('/unidadmedida/guardar', 'store')->name('guardar_unidad_medida');
    Route::get('/unidadmedida/{id}/editar', 'edit')->name('editar_unidad_medida');
    Route::put('/unidadmedida/{id}/actualizar', 'update')->name('actualizar_unidad_medida');
    Route::get('/unidadmedida/{id}/eliminar', 'destroy')->name('eliminar_unidad_medida');
});

Route::controller(ConversionController::class)->group(function(){
    Route::get('/conversion/ver', 'index')->name('ver_conversion');
    Route::get('/conversion/crear', 'create')->name('crear_conversion');
    Route::get('/conversion/guardar', 'store')->name('guardar_conversion');
    Route::get('/conversion/{id}/editar', 'edit')->name('editar_conversion');
    Route::put('/conversion/{id}/actulizar', 'update')->name('actualizar_conversion');
});

Route::controller(MateriaPrimaController::class)->group(function(){
    Route::get('/materiaprima/ver', 'index')->name('ver_materia_prima');
    Route::get('/materiaprima/crear', 'create')->name('crear_materia_prima');
    Route::post('/materiaprima/guardar', 'store')->name('guardar_materia_prima');
    Route::get('/materiaprima/{id}/mostrar', 'show')->name('mostrar_materia_prima');
    Route::put('/materiaprima/{id}/agregar', 'add')->name('agregar_materia_prima');
    Route::get('/materiaprima/{id}/editar', 'edit')->name('editar_materia_prima');
    Route::put('/materiaprima/{id}/actualizar', 'update')->name('actualizar_materia_prima');
    Route::get('/materiaprima/{id}/eliminar', 'destroy')->name('eliminar_materia_prima');
});

Route::controller(ProductoController::class)->group(function(){
    Route::get('/producto/ver', 'index')->name('ver_producto');
    Route::get('/producto/crear', 'create')->name('crear_producto');
    Route::post('/producto/guardar', 'store')->name('guardar_producto');
    Route::get('/producto/{id}/mostrar', 'show')->name('mostrar_producto');
    Route::get('/producto/{id}/editar', 'edit')->name('editar_producto');
    Route::put('/producto/{id}/actualizar', 'update')->name('actualizar_producto');
    Route::get('/producto/{id}/eliminar', 'destroy')->name('eliminar_producto');
});

Route::controller(RecetaController::class)->group(function(){
    Route::get('/receta/{id}/ver', 'index')->name('ver_receta');
    Route::get('/receta/crear', 'create')->name('crear_receta');
    Route::post('/receta/guardar', 'store')->name('guardar_receta');
    Route::get('/receta/{id}/editar', 'edit')->name('editar_receta');
    Route::put('/receta/{id}/actualizar', 'update')->name('actualizar_receta');
    Route::get('/receta/{id}/eliminar', 'destroy')->name('eliminar_receta');
});

Route::controller(OperarioController::class)->group(function(){
    Route::get('/operario/ver', 'index')->name('ver_operario');
    Route::get('/operario/crear', 'create')->name('crear_operario');
    Route::post('/operario/guardar', 'store')->name('guardar_operario');
    Route::get('/operario/{id}/editar', 'edit')->name('editar_operario');
    Route::put('/operario/{id}/actualizar', 'update')->name('actualizar_operario');
    Route::get('/operario/{id}/eliminar', 'destroy')->name('eliminar_operario');
});