<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class,'loadRegister']);
Route::post('/register',[UserController::class,'userRegister'])->name('userRegister');

Route::get('/login',[UserController::class,'loadLogin']);
Route::post('/',[UserController::class,'userLogin'])->name('userLogin');
