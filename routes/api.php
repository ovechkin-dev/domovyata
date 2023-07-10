<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('player', \App\Http\Controllers\PlayerController::class);
Route::resource('player/items', \App\Http\Controllers\ItemController::class);
Route::get('/player/{player}/items', [\App\Http\Controllers\PlayerController::class, 'items_get']);


