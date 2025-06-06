<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarResourceController;
use App\Http\Controllers\ChallController;
use App\Http\Controllers\SuccessCarController;



Route::get('/about', function () {
    return view('about.index');
}); 



Route::get("/product/{firstValue}/{secValue}", function (int $firstValue,int $secondValue){
    return  $firstValue + $secondValue;
})->whereNumber(["firstValue","secValue"]);



Route::get("/success",SuccessCarController::class);

Route::resource("/cars", CarResourceController::class);

// Route::prefix("/")->controller(ChallController::class)->group(function (){
//     Route::get("/sum/{a}/{b}","su");
// });