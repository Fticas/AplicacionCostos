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

