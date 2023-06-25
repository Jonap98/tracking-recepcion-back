<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\recepcion\PaquetesController;
use App\Http\Controllers\catalogos\AreasController;
use App\Http\Controllers\catalogos\PaqueteriasController;
use App\Http\Controllers\catalogos\DestinatariosController;
use App\Http\Controllers\catalogos\UsuariosTarjetaController;
use App\Http\Controllers\mail\MailController;
use App\Http\Controllers\auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function() {

});

// =====================================================================
// Catalogos
// =====================================================================
// Áreas
Route::get('areas', [AreasController::class, 'index'])->name('areas');
Route::post('areas/create', [AreasController::class, 'store'])->name('areas.create');
Route::post('areas/update', [AreasController::class, 'update'])->name('areas.update');

// Paqueterías
Route::get('paqueterias', [PaqueteriasController::class, 'index'])->name('paqueterias');
Route::post('paqueterias/create', [PaqueteriasController::class, 'store'])->name('paqueterias.create');
Route::post('paqueterias/update', [PaqueteriasController::class, 'update'])->name('paqueterias.update');

// Destinatarios
Route::get('destinatarios', [DestinatariosController::class, 'index'])->name('destinatarios');
Route::post('destinatarios/create', [DestinatariosController::class, 'store'])->name('destinatarios.create');
Route::post('destinatarios/update', [DestinatariosController::class, 'update'])->name('destinatarios.update');

// Usuarios tarjeta
Route::get('usuarios-tarjeta', [UsuariosTarjetaController::class, 'index'])->name('usuarios-tarjeta');
Route::get('usuarios-tarjeta/{tarjeta}/filters', [UsuariosTarjetaController::class, 'filters'])->name('usuarios-tarjeta.filters');
Route::post('usuarios-tarjeta/store', [UsuariosTarjetaController::class, 'store'])->name('usuarios-tarjeta.store');



// =====================================================================
// Paquetes
// =====================================================================
Route::get('paquetes', [PaquetesController::class, 'index'])->name('paquetes');
Route::post('paquetes/filters', [PaquetesController::class, 'filters'])->name('paquetes.filters');
Route::post('paquetes/create', [PaquetesController::class, 'store'])->name('paquetes.create');
Route::post('paquetes/update', [PaquetesController::class, 'update'])->name('paquetes.update');


// =====================================================================
// Email
// =====================================================================
Route::post('send-mail', [MailController::class, 'store'])->name('send-mail');

// =====================================================================
// Auth
// =====================================================================
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
