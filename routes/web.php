<?php

use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fetchdata', [RegisterController::class, 'fetchdata']);
