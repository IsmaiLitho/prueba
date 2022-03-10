<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientesController;

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

Route::get('Clientes', [ClientesController::class,'index']);
Route::get('getClientes', [ClientesController::class,'getClientes']);
Route::get('Clientes/create', [ClientesController::class,'create']);
Route::post('Clientes/store', [ClientesController::class,'store']);
Route::get('Clientes/edit/{idcli}', [ClientesController::class,'edit']);
Route::post('Clientes/update', [ClientesController::class,'update']);
Route::get('Clientes/delete/{idcli}', [ClientesController::class,'delete']);

