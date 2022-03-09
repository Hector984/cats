<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Fetches all the cats from the DB
Route::get('cats/', [App\Http\Controllers\CatController::class, 'index']);

//Endpoint to retrieve a particular cat
Route::get('cats/{cat}', [App\Http\Controllers\CatController::class, 'show'])->name('cats.show');

//Form to create a cat
Route::get('cats/{cats}', [App\Http\Controllers\CatController::class, 'create']);

//Endpoint to save the information
Route::post('cats/',[App\Http\Controllers\CatController::class, 'store'])->name('cats.store');