<?php

use App\Http\Controllers\YandexMapController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/query', [YandexMapController::class, 'index']);
