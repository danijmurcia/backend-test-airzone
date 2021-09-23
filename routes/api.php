<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Categorias
Route::group(['prefix' => 'categories'], function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('{category}', [CategoryController::class, 'show']);
    Route::post('', [CategoryController::class, 'store']);
    Route::put('{category}', [CategoryController::class, 'update']);
    Route::delete('{category}', [CategoryController::class, 'destroy']);
});

// Posts
Route::group(['prefix' => 'posts'], function () {
    Route::get('', [PostController::class, 'index']);
    Route::get('{id}', [PostController::class, 'show']);
});
