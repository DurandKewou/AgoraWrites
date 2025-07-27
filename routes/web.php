<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReaderController; 
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Dom\Comment;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [PostController::class, 'index']);

Route::get('/register',[UserController::class,'loadRegister']);
Route::post('/register',[UserController::class,'userRegister'])->name('userRegister');

Route::get('/login',[UserController::class,'loadLogin'])->name('login');
Route::post('/login',[UserController::class,'userLogin'])->name('userLogin');

Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

Route::get('/forgot-password',[UserController::class,'loadForgotPassword'])->name('forgot-password');
Route::post('/forgot-password',[UserController::class,'userForgotPassword'])->name('userForgotPassword');

Route::get('/reset-password/{email}',[UserController::class,'loadResetPassword'])->name('reset-password');



Route::middleware(['auth'])->group(function () {
    Route::post('/',[UserController::class,'userResetPassword'])->name('userResetPassword');

    Route::get('/posts/access/{id}', [PostController::class, 'access'])->name('post.access');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/posts/{id}', [PostController::class, 'showPost'])->name('showPost');
    Route::post('/post/{id}/like', [PostController::class, 'like'])->name('post.like');
    Route::post('/post/{id}/dislike', [PostController::class, 'dislike'])->name('post.dislike');
   

});


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
    Route::put('/categorie/edit/{id}', [CategoryController::class,'update'])->name('editCategorie');
    Route::delete('/categorie/{id}', [CategoryController::class, 'destroy'])->name('destroyCategorie');
    Route::get('/post', [PostController::class,'allPost'])->name('index');
    Route::get('/post/create', [PostController::class,'createPost'])->name('createPost');
    Route::post('/post', [PostController::class,'SavePost'])->name('SavePost');
    Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('edit');
    Route::put('/post/update/{id}', [PostController::class,'update'])->name('update');
    Route::delete('/post/delete/{id}', [PostController::class,'destroy'])->name('delete');
    Route::get('/postlist', [PostController::class,'postAdmin']);
    Route::put('/posts/publish/{id}', [AdminController::class, 'publishPost'])->name('publishPost');
    Route::get('/posts/{id}', [PostController::class, 'showPostAdmin'])->name('showPost');
    Route::get('/showComment', [CommentController::class,'showComment']);
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/allUser', [AdminController::class, 'showUser'])->name('allUser');
    Route::get('/editUser/{id}', [AdminController::class, 'editUser'])->name('edit');
    Route::put('/updateUser/{id}', [UserController::class, 'updateRole'])->name('updateRole');
    Route::delete('/deleteUser/{id}', [UserController::class, 'destroy'])->name('deleteUser');
    Route::get('/profileUser/{id}', [AdminController::class, 'show'])->name('profileUser');
    Route::get('/edit/{id}', [AdminController::class,'edit'])->name('edit');
    Route::put('/update/{id}', [AdminController::class,'update'])->name('update');
    Route::get('/edit/{id}', [AuthorController::class,'edit'])->name('edit');
    Route::delete('/delete/{id}', [AdminController::class,'destroyPost'])->name('delete');

    
    Route::get('/statistics', [DashboardController::class, 'stats'])->name('statistics');
    Route::get('/dashboard/export/{format}', [DashboardController::class, 'export'])->name('dashboard.export');
    Route::get('/export-posts', [DashboardController::class, 'exportExcel'])->name('excel');

});

// Assuming you have an AuthorController for author functionalities
Route::middleware(['auth', 'role:Author'])->prefix('author')->name('author.')->group(function () {
    Route::get('/index', [AuthorController::class,'index'])->name('index');
    Route::get('/createPost', [AuthorController::class,'create'])->name('create');
    Route::post('/index', [PostController::class,'SavePost'])->name('SavePost');
    Route::get('/post', [AuthorController::class,'postAuthor'])->name('post');
    Route::get('/posts/{id}', [PostController::class, 'showPostAuthor'])->name('showPost');
    Route::get('/edit/{id}', [AuthorController::class,'edit'])->name('edit');
    Route::put('update/{id}', [AuthorController::class,'update'])->name('update');
    Route::delete('/author/delete/{id}', [AuthorController::class,'destroy'])->name('delete');
    Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/profile',[AuthorController::class,'profile'])->name('author.profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('updateProfile');

    
});

// Assuming you have a ReaderController for reader functionalities
Route::middleware(['auth','role:Lecteur'])->prefix('reader')->name('reader.')->group(function(){
    Route::get('/index', [ReaderController::class,'index'])->name('index');
    Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/post/access/{id}', [PostController::class, 'access'])->name('post.access');
});
