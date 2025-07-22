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

Route::get('/', [PostController::class, 'index']);

Route::get('/register',[UserController::class,'loadRegister']);
Route::post('/register',[UserController::class,'userRegister'])->name('userRegister');

Route::get('/login',[UserController::class,'loadLogin'])->name('login');
Route::post('/login',[UserController::class,'userLogin'])->name('userLogin');

Route::get('/forgot-password',[UserController::class,'loadForgotPassword'])->name('forgot-password');
Route::post('/forgot-password',[UserController::class,'userForgotPassword'])->name('userForgotPassword');

Route::get('/reset-password/{email}',[UserController::class,'loadResetPassword'])->name('reset-password');
Route::post('/',[UserController::class,'userResetPassword'])->name('userResetPassword');

Route::get('/post/access/{id}', [PostController::class, 'access'])->name('post.access');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');

/**
 * =====================
 *  Routes Admin
 * =====================
 */
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'showUser'])->name('showUser');
    Route::get('/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::put('/profile/update', [AdminController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/editAuthor',[AdminController::class,'editAuthor']);
    Route::get('/editReader',[AdminController::class,'editReader']);
    Route::get('/categorie',[CategoryController::class,'index'])->name('categorie');
    Route::post('/categorie',[CategoryController::class,'createCategorie'])->name('createCategorie');
    Route::get('/post', [PostController::class,'postAdmin'])->name('index');
    Route::get('/edit/{id}', [AuthorController::class,'edit'])->name('edit');
    Route::delete('/delete/{id}', [AdminController::class,'destroyPost'])->name('delete');
});


// Assuming you have an AuthorController for author functionalities
Route::middleware(['auth', 'role:Author'])->prefix('author')->name('author.')->group(function () {
    Route::get('/index', [AuthorController::class,'index'])->name('index');
    Route::get('/createPost', [AuthorController::class,'create'])->name('create');
    Route::post('/index', [PostController::class,'SavePost'])->name('SavePost');
    Route::get('/post', [AuthorController::class,'postAuthor'])->name('post');
    Route::get('/edit/{id}', [AuthorController::class,'edit'])->name('edit');
    Route::put('update/{id}', [AuthorController::class,'update'])->name('update');
    Route::delete('/author/delete/{id}', [AuthorController::class,'destroy'])->name('delete');

    Route::get('/profile',[AuthorController::class,'profile'])->name('author.profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('updateProfile');

    
});

// Assuming you have a ReaderController for reader functionalities
Route::get('/reader/index', [ReaderController::class,'index'])->name('reader.index');