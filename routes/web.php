<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\ventasController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\vendedorController;
use App\Http\Controllers\facturacionController;

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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/productos', productosController::class);
Route::resource('/ventas', ventasController::class);
Route::resource('/administrador', adminController::class);
Route::resource('/vendedores', vendedorController::class);
Route::resource('/facturacion', facturacionController::class);
Route::post('/ventas/{id}/', [App\Http\Controllers\ventasController::class]);
Route::get('/productos/{id}/borrar', [App\Http\Controllers\productosController::class, 'drop']);
Route::get('/vendedores/{id}/borrar', [App\Http\Controllers\vendedorController::class, 'drop']);
