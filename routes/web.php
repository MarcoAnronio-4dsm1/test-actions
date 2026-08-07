<?php

use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/tareas');

Route::resource('tareas', TareaController::class);
