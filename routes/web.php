<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\PendientesController;
use App\Http\Controllers\CorregidosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

//Formulario
Route::post('/solicitudes', [SolicitudController::class, 'store'])->name('solicitudes.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Solicitudes
    Route::get('/solicitudes', [SolicitudController::class, 'solicitudes'])->name('solicitudes.index');
    Route::post('/solicitudes/asignar', [SolicitudController::class, 'asignar'])->name('solicitudes.asignar');
    Route::post('/solicitudes/rechazar', [SolicitudController::class, 'rechazar'])->name('solicitudes.rechazar');
    Route::post('/solicitudes/estado', [SolicitudController::class, 'actualizarEstado'])->name('solicitudes.estado');
    Route::post('/solicitudes/prioridad', [SolicitudController::class, 'actualizarPrioridad'])->name('solicitudes.prioridad');

    // Pendientes
    Route::get('/pendientes', [SolicitudController::class, 'pendientes'])->name('pendientes.index');
    Route::get('/solicitudes/{id}/corregir', [SolicitudController::class, 'formCorregir'])->name('solicitudes.formCorregir');
    Route::post('/solicitudes/{id}/corregir', [SolicitudController::class, 'guardarCorregida'])->name('solicitudes.guardarCorregida');


    //Corregidos
    Route::get('/corregidos', [SolicitudController::class, 'corregidos'])->name('corregidos.index');

    //Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
});

Route::get('/form', function () {
    return view('mantenimiento.formulario.formulario');
});

require __DIR__.'/auth.php';
