<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return 'API del acortador funcionando';
});

Route::get('/{code}', [UrlController::class, 'redirect']);  // Ruta para redirigir
