<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultorioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PodologaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {

        /** Pacientes */
        Route::prefix('pacientes')->group(function () {

            Route::get('', [PacienteController::class, 'index'])->name('pacientes.index');
            Route::post('/datatable', [PacienteController::class, 'datatable']);
            //Route::get('/create', [PacienteController::class, 'create'])->name('pacientes.create');
            Route::post('/store-process', [PacienteController::class, 'store']);
            Route::get('/show/{ficha}', [PacienteController::class, 'show']);
            //Route::get('/datatable/{ficha}', [PacienteController::class, 'listEquipos']);
            Route::get('/edit/{ficha}', [PacienteController::class, 'edit'])->name('pacientes.edit');
            Route::put('/update-process', [PacienteController::class, 'update']);

            /** Historia clinica podologico */
            Route::prefix('historia-clinica-podologica')->group(function () {

                Route::get('', [PacienteController::class, 'index'])->name('pacientes.index');
                Route::post('/datatable', [PacienteController::class, 'datatable']);
                //Route::get('/create', [PacienteController::class, 'create'])->name('pacientes.create');
                Route::post('/store-process', [PacienteController::class, 'store']);
                Route::get('/show/{ficha}', [PacienteController::class, 'show']);
                //Route::get('/datatable/{ficha}', [PacienteController::class, 'listEquipos']);
                Route::get('/edit/{ficha}', [PacienteController::class, 'edit'])->name('pacientes.edit');
                Route::put('/update-process', [PacienteController::class, 'update']);

            });

        });

        /** Citas */
        Route::prefix('citas')->group(function () {
            Route::get('', [CitaController::class, 'index'])->name('citas.index');
            Route::post('/datatable', [CitaController::class, 'datatable']);
            Route::get('/create', [CitaController::class, 'create'])->name('citas.create');
            Route::post('/store-process', [CitaController::class, 'store']);
            Route::get('/show/{ficha}', [CitaController::class, 'show']);
            Route::put('/update-process', [CitaController::class, 'update']);
            Route::get('/showPacientexDNI/{ficha}', [CitaController::class, 'showPacientexDNI']);
        });

        /** Calendario */
        Route::prefix('calendario')->group(function () {
            Route::get('', [CitaController::class, 'calendar'])->name('citas.calendario');
        });

        /** Podologas */
        Route::prefix('podologas')->group(function () {

            Route::get('', [PodologaController::class, 'index'])->name('podologas.index');
            Route::post('/datatable', [PodologaController::class, 'datatable']);
            Route::post('/store-process', [PodologaController::class, 'store']);
            Route::get('/show/{ficha}', [PodologaController::class, 'show']);
            Route::put('/update-process', [PodologaController::class, 'update']);

        });

        /** Consultorios */
        Route::prefix('consultorios')->group(function () {

            Route::get('', [ConsultorioController::class, 'index'])->name('consultorios.index');
            Route::post('/datatable', [ConsultorioController::class, 'datatable']);
            Route::post('/store-process', [ConsultorioController::class, 'store']);
            Route::get('/show/{ficha}', [ConsultorioController::class, 'show']);
            Route::put('/update-process', [ConsultorioController::class, 'update']);

        });

        /** Productos */
        Route::prefix('productos')->group(function () {

            Route::get('', [ProductoController::class, 'index'])->name('productos.index');
            Route::post('/datatable', [ProductoController::class, 'datatable']);
            Route::post('/store-process', [ProductoController::class, 'store']);
            Route::get('/show/{ficha}', [ProductoController::class, 'show']);
            Route::put('/update-process', [ProductoController::class, 'update']);

        });


    });

});

