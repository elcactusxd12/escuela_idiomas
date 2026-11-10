
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AsistenciaController;


// ========================================
// PÁGINA PRINCIPAL
// ========================================

Route::get('/', function () {

    if (Auth::check()) {
        return redirect()->route('home');
    }

    return view('welcome');

});


// ========================================
// AUTENTICACIÓN
// ========================================

Auth::routes();


// ========================================
// INICIO DEL SISTEMA
// ========================================

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');


// ========================================
// CRUD DE LA ESCUELA DE IDIOMAS
// ========================================

Route::middleware('auth')->group(function () {

    Route::resource('alumnos', AlumnoController::class);
    Route::resource('profesores', ProfesorController::class);
    Route::resource('idiomas', IdiomaController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('grupos', GrupoController::class);
    Route::resource('matriculas', MatriculaController::class);
    Route::resource('pagos', PagoController::class);
    Route::resource('asistencias', AsistenciaController::class);

});
