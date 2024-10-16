<?php

use App\Http\Controllers\ComunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para ver el listado de comunas (index)
Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');

// Ruta para mostrar el formulario de creación (create)
Route::get('/comunas/create', [ComunaController::class, 'create'])->name('comunas.create');

// Ruta para almacenar una nueva comuna (store)
Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');

// Ruta para mostrar el formulario de edición de una comuna específica (edit)
Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');

// Ruta para actualizar una comuna (update)
Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');

// Ruta para eliminar una comuna (destroy)
Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');
