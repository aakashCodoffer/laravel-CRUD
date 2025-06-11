<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarResourceController;
use App\Http\Controllers\SuccessCarController;
use App\Http\Controllers\UserController;

Route::get('/about', function () {
    return view('about.index');
}); 

Route::get("/product/{firstValue}/{secValue}", function (int $firstValue,int $secondValue){
    return  $firstValue + $secondValue;
})->whereNumber(["firstValue","secValue"]);

//resource cars controller
Route::middleware([AuthMiddleware::class])->resource("/cars", CarResourceController::class);

Route::get("/login",[UserController::class,'showLoginForm'])->name("login.user");
Route::post("/login",[UserController::class,'login'])->name("login");

Route::get("/register",[UserController::class,'showRegisterForm'])->name("register.user");
Route::post("/register",[UserController::class,'createAccount'])->name("register");

Route::post("/logout",[UserController::class,'logout'])->name("logout");