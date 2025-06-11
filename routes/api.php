<?php

use App\Http\Controllers\CarApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('car',CarApiController::class);


