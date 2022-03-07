<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('cats/', [App\Http\Controllers\CatsController::class, 'index']);

Route::get('cats/{cats}', [App\Http\Controllers\CatsController::class, 'create']);
Route::post('cats/',[App\Http\Controllers\CatsController::class, 'store']);