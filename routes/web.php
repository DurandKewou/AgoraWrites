<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReaderController; 
use App\Http\Controllers\PostController;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class,'loadRegister']);
Route::post('/register',[UserController::class,'userRegister'])->name('userRegister');

Route::get('/login',[UserController::class,'loadLogin'])->name('login');
Route::post('/login',[UserController::class,'userLogin'])->name('userLogin');

Route::get('/forgot-password',[UserController::class,'loadForgotPassword'])->name('forgot-password');
Route::post('/forgot-password',[UserController::class,'userForgotPassword'])->name('userForgotPassword');

Route::get('/reset-password/{email}',[UserController::class,'loadResetPassword'])->name('reset-password');
Route::post('/',[UserController::class,'userResetPassword'])->name('userResetPassword');

/**
 * =====================
 *  Routes Admin
 * =====================
 */
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('/editAuthor',[AdminController::class,'editAuthor']);
    Route::get('/editReader',[AdminController::class,'editReader']);
    Route::get('/categorie',[CategoryController::class,'index'])->name('categorie');
    Route::post('/categorie',[CategoryController::class,'createCategorie'])->name('createCategorie');
    Route::get('/post', [PostController::class,'postAdmin'])->name('index');
    Route::get('/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}',[AdminController::class,'destroy'])->name('admin.delete');
    Route::get('/admin/show/{id}',[AdminController::class,'show'])->name('admin.show');
});


// Assuming you have an AuthorController for author functionalities
Route::middleware(['auth', 'role:Author'])->prefix('author')->name('author.')->group(function () {
    Route::get('/index', [AuthorController::class,'index'])->name('index');
    Route::get('/createPost', [AuthorController::class,'create'])->name('create');
    Route::post('/store', [AuthorController::class,'store'])->name('author.store');
    Route::get('/author/edit/{id}', [AuthorController::class,'edit'])->name('author.edit');
    Route::put('/author/update/{id}', [AuthorController::class,'update'])->name('author.update');
    Route::delete('/author/delete/{id}', [AuthorController::class,'destroy'])->name('author.delete');
    
});

// Assuming you have a ReaderController for reader functionalities
Route::get('/reader/index', [ReaderController::class,'index'])->name('reader.index');