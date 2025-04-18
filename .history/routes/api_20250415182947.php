<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\BrandsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


