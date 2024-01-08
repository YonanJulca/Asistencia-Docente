<?php

use Illuminate\Support\Facades\Route;
use App\Models\Asistencia;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\JustificacionController;
use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Rutas web
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por RouteServiceProvider dentro de un grupo
| que contiene el middleware "web". ¡Ahora crea algo grandioso!
|
*/

// Página de inicio
Route::get('/', function () {
    return view('login');
});

// Redireccionar de home a inicio
Route::redirect('/home', '/inicio')->name('home');

// Vistas y acciones para las páginas principales
Route::view('/inicio', 'inicio');
Route::view('/reporte', 'reporte');
Route::view('/justificacion', 'justificacion');
Route::view('/ayuda', 'ayuda');


// Rutas de autenticación
Auth::routes();

// Página de inicio
Route::group(['middleware' => 'auth'], function () {
    // Panel principal
    Route::get('/inicio', [HomeController:: class,'mostrarPaginaPrincipal'])->name('inicio');
    
    // Rutas de Asistencia
    Route::get('/asistencia', [AsistenciaController::class, 'verHistorial'])->name('asistencia.index');
    Route::post('/registrar-entrada-salida', [AsistenciaController::class, 'registrarEntradaSalida'])->name('registrar.entrada.salida');
    
    // Rutas de Reporte
    Route::get('/reporte', [GraficoController::class, 'verReporte'])->name('reporte.index');
    Route::get('/descargar-pdf', [GraficoController::class, 'descargarPDF'])->name('reporte.descargar.pdf');
    Route::get('/descargar-excel', [GraficoController::class, 'descargarExcel'])->name('reporte.descargar.excel');
    
    // Rutas de Justificación
    Route::post('/enviar-justificacion', [JustificacionController::class, 'enviarJustificacion'])->name('enviar.justificacion');
    Route::get('/verJustificacion', [JustificacionController::class, 'verJustificaciones'])->name('ver.justificaciones');
    Route::get('/descargar-evidencia/{id}', [JustificacionController::class, 'descargarEvidencia'])->name('descargar.evidencia');
});
