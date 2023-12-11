<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});

// rutas para modulo de membresia (roles y permisos)
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', App\Http\Controllers\RolController::class);
    Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
});

//rutas para cambiar el estado de usuaruio
Route::post('camestadousu/{id}',[App\Http\Controllers\UsuarioController::class, 'cambiarEstado']);


//rutas para modulo de mantenimiento
Route::group(['middleware' => ['auth']], function () {
    Route::resource('marca', App\Http\Controllers\marcasController::class);
    Route::resource('modelo', App\Http\Controllers\modelsController::class);
    Route::resource('estado', App\Http\Controllers\estadosController::class);
    Route::resource('categoria', App\Http\Controllers\CategoriasController::class);
    Route::resource('trabajador', App\Http\Controllers\TrabajadorController::class);
    Route::resource('area', App\Http\Controllers\areasController::class);
    Route::resource('catalogo', App\Http\Controllers\catalogosController::class);
    Route::resource('escritorio', App\Http\Controllers\escritorioController::class);
    Route::resource('Inventario', App\Http\Controllers\InventarioController::class);
    Route::resource('asistencia', App\Http\Controllers\asistenciaController::class);
    

});

//rutas para modulo de cuentas
Route::group(['middleware' => ['auth']], function () {
    Route::resource('telefonos', App\Http\Controllers\TelefonoController::class);
    Route::resource('emails', App\Http\Controllers\EmailController::class);
});



