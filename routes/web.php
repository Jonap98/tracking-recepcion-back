<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\recepcion\PaquetesController;

use App\Http\Controllers\mail\MailController;

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


Route::get('preview', [MailController::class, 'index'])->name('preview');

Route::get('recepcion/dashboard', [PaquetesController::class, 'index'])->name('recepcion.dashboard');







