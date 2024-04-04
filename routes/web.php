<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TiposDocumentosController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // VISTA DE DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // VISTA DE USUARIOS
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/create', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::patch('/usuarios/edit/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::delete('/usuarios/delete/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');


    // VISTA DE CLIENTES
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes/create', [ClienteController::class, 'store'])->name('clientes.store');
    Route::patch('/clientes/edit/{id}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::delete('/clientes/delete/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    // VISTA DE EMPRESAS
    Route::get('/empresas', [EmpresasController::class, 'index'])->name('empresas.index');
    Route::get('/empresas/create', [EmpresasController::class, 'create'])->name('empresas.create');
    Route::post('/empresas/create', [EmpresasController::class, 'store'])->name('empresas.store');
    Route::patch('/empresas/edit/{id}', [EmpresasController::class, 'update'])->name('empresas.update');
    Route::get('/empresas/edit/{id}', [EmpresasController::class, 'edit'])->name('empresas.edit');
    Route::delete('/empresas/delete/{id}', [EmpresasController::class, 'destroy'])->name('empresas.destroy');
    
    // VISTA DE DOCUMENTOS
    Route::get('/documentos', [DocumentosController::class, 'index'])->name('documentos.index');
    Route::get('/documentos/create', [DocumentosController::class, 'create'])->name('documentos.create');
    // Route::post('/documentos/create', [DocumentosController::class, 'store'])->name('documentos.store');
    // Route::patch('/documentos/edit/{id}', [DocumentosController::class, 'update'])->name('documentos.update');
    Route::get('/documentos/edit/{id}', [DocumentosController::class, 'edit'])->name('documentos.edit');
    Route::get('/documentos/remision/{id}', [ShowController::class, 'showRemision'])->name('documentos.showRemision');
    Route::get('/documentos/garantia_cambios/{id}', [ShowController::class, 'showGarantiaCambios'])->name('documentos.showGarantiaCambios');
    Route::delete('/documentos/delete/{id}', [DocumentosController::class, 'destroy'])->name('documentos.destroy');


    // VISTA DE TIPOS DOCUMENTOS
    Route::get('/tiposdocumentos', [TiposDocumentosController::class, 'index'])->name('tiposdocumentos.index');
    // Route::get('/tiposdocumentos/create', [TiposDocumentosController::class, 'create'])->name('tiposdocumentos.create');
    // Route::post('/tiposdocumentos/create', [TiposDocumentosController::class, 'store'])->name('tiposdocumentos.store');
    // Route::patch('/tiposdocumentos/edit/{id}', [TiposDocumentosController::class, 'update'])->name('tiposdocumentos.update');
    // Route::get('/tiposdocumentos/edit/{id}', [TiposDocumentosController::class, 'edit'])->name('tiposdocumentos.edit');
    // Route::delete('/tiposdocumentos/delete/{id}', [TiposDocumentosController::class, 'destroy'])->name('tiposdocumentos.destroy');
});
