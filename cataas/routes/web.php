<?php

use App\Http\Controllers\CatImageController;

Route::get('/', [CatImageController::class, 'index']);
Route::get('/tag/{tag}', [CatImageController::class, 'filter']);
