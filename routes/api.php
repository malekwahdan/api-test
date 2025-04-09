<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\TodoController;
use App\Models\Todo;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});
Route::controller(TodoController::class)->middleware('auth:sanctum')->group(function(){
    Route::get('index', 'index');
    Route::post('store', 'store');
    Route::post('aa', 'aa');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
    Route::get('show/{id}', 'show');

});
