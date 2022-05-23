<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\RegistrerController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('home');}) -> name('home');

//para iniciar sesion 
// -> middleware('guest')
Route::get('/login', [SessionsController::class, 'create'])->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

// Para registrar
// -> middleware('guest')
Route::get('/register', [RegistrerController::class, 'create'])->name('register.index');
Route::post('/register', [RegistrerController::class, 'store'])->name('register.store');

//para Cerrar sesion 
Route::get('/logout', [SessionsController::class, 'destroy'])-> middleware('auth')->name('login.destroy');

// Home docente 
Route::get('/homedocente', [DocenteController::class,'create']) -> middleware('auth.docente')-> name('homedocente.index');
Route::get('/homedocente/examen',[DocenteController::class,'examen'])->name('homedocente.examen');
Route::get('/homedocente/resultados',[DocenteController::class,'resultados'])->name('homedocente.resultados');

// Home alumno
Route::get('/homealumno', [AlumnoController::class,'create']) -> middleware('auth.alumno')->name('homealumno.index');
Route::get('/homealumno/examen',[AlumnoController::class,'examen'])->name('homealumno.examen');
Route::get('/homealumno/resultados',[AlumnoController::class,'resultados'])->name('homealumno.resultados');

//Examenes Docente 
Route::get('/homedocente/examen/tituloExamen',[DocenteController::class,'storeExamen'])->name('homedocente.tituloExamen');
Route::post('/homedocente/examen/tituloExamen',[DocenteController::class,'storeCrearExamen'])->name('homedocente.crearExamen');

Route::get('/homedocente/examen/generarExamen',[DocenteController::class,'storePreguntas'])->name('homedocente.preguntaseExamen');
Route::post('/homedocente/examen/generarExamen',[DocenteController::class,'storeCrearPreguntas'])->name('homedocente.crearPreguntas');

// Borrar Examen
Route::delete('/homedocente/{examen}',[DocenteController::class,'destroy'])->name('homedocente.destroy');

// Editar Examen
Route::get('/homedocente/examen/{idExamen}',[DocenteController::class,'editarexamen'])->name('homedocente.editarexamen');

// Para Eliminar una pregunta
Route::delete('/homedocente/examen/eliminarpregunta/{idPregunta}',[DocenteController::class,'destroyPregunta'])->name('homedocente.destroyPregunta');

// Para Nueva Pregunta
Route::get('/homedocente/examen/agregarpregunta/{idExamen}',[DocenteController::class,'addPregunta'])->name('homedocente.addPregunta');

// Para guardar la nueva Pregunta
Route::post('/homedocente/examen/agregarpregunta',[DocenteController::class,'savePregunta'])->name('homedocente.savePregunta');

// Para Editar Pregunta
Route::get('/homedocente/examen/editarpregunta/{idExamen}',[DocenteController::class,'editarPregunta'])->name('homedocente.editarPregunta');

// Para Guardar la pregunta Editada
Route::put('/homedocente/examen/editarpregunta/{collPregunta}',[DocenteController::class,'saveEditarPregunta'])->name('homedocente.saveEditarPregunta');


//listar las preguntas para contestar Examen Alumno
Route::get('/homealumno/examen/{idExamen}',[AlumnoController::class,'contestarexamen'])->name('homealumno.contestarexamen');

//para Calificar
Route::post('/homealumno/examen/calificarexamen',[AlumnoController::class,'calificar'])->name('homealumno.calificar');

// Para generar PDF en alumno:
Route::get('/homealumno/resultados/generarpdf',[AlumnoController::class,'generarpdf'])->name('homealumno.generarpdf');

// Para generar PDF en Docente:
Route::get('/homedocente/resultados/crearpdf',[DocenteController::class,'crearpdf'])->name('homedocente.crearpdf');


// Para editar el titulo del examen
Route::get('/homedocente/examen/editartituloexamen/view/{idExamen}',[DocenteController::class,'editartitulo'])->name('homedocente.editartituloexamen');
// Para guardar el nuevo titulo del examen
Route::put('/homedocente/examen/editartituloexamen/guardartituloedit/{collexa}',[DocenteController::class,'guardartituloedit'])->name('homedocente.guardartituloedit');