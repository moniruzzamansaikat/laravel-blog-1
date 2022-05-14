<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DCommentsController;
use App\Http\Controllers\DPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('blog.show');
Route::view('/about', 'pages.about')->name('about');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authentication
Route::prefix('auth')->controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/login', 'get_login')->name('login.form');
    Route::post('/', 'handle_login')->name('login');
    Route::get('/register', 'get_register')->name('register.form');
    Route::post('/register', 'handle_register')->name('register');
    Route::get('/', 'logout')->name('logout');
});

Route::post('/newsletter', [NewsLetterController::class, 'store'])->name('newsletter.store');
Route::post('/blog/{post}/comments', [CommentController::class, 'store'])->name('blog.comments.store');

// dashboard
Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/posts', [DPostController::class, 'index'])->name('posts');
    Route::put('/posts/{post}', [DPostController::class, 'update'])->name('posts.update');
    Route::get('/posts/create', [DPostController::class, 'create'])->name('posts.create');
    Route::get('/posts/edit/{post:slug}', [DPostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/store', [DPostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [DPostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/comments', [DCommentsController::class, 'index'])->name('comments.index');
    Route::get('/comments/{comment}', [DCommentsController::class, 'show'])->name('comments.show');
    Route::delete('/comments/{comment}', [DCommentsController::class, 'destroy'])->name('comments.destory');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile/info', [ProfileController::class, 'update_info'])->name('profile.info');
    Route::get('/profile/delete', [ProfileController::class, 'delete_account'])->name('profile.delete');
    Route::post('/profile/udpate/security', [ProfileController::class, 'update_password'])->name('profile.security');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/edit/{category:name}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});

// 404 page
Route::fallback(function () {
    return view('pages.404');
});
