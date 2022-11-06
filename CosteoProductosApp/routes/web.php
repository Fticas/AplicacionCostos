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

Route::get('/', function(){
    return view('layout.plantillaprincipal');
});

Route::resource('unidadesmedida', UnidadMedidaController::class);
Route::resource('conversiones', ConversionController::class);
Route::resource('materiasprimas', MateriaPrimaController::class);
Route::resource('recetas', RecetaController::class);
Route::resource('recetasmateriasprimas', RecetaMateriaPrimaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('operarios', OperarioController::class);
Route::resource('compras', CompraController::class);
Route::resource('ordenescompra', OrdenesCompraController::class);


Route::resource('pedidos', PedidoController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('costosoperativos', CostoOperativoController::class);
Route::resource('depreciaciones', DepreciacionController::class);
Route::resource('gastosoperaciones', GastoOperacionesController::class);