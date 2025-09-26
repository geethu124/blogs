<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\usermiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', usermiddleware::class.':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('Admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/blog-list', [BlogsController::class, 'adminlist'])->name('admin.blogs.list');
    Route::post('/admin/blog-approve/{blog}', [BlogsController::class, 'approve'])->name('admin.blogs.approve');
    Route::post('/admin/blog-reject/{blog}', [BlogsController::class, 'reject'])->name('admin.blogs.reject');
    Route::get('/admin/blogs/view/{blog}', [BlogsController::class, 'view'])->name('admin.blogs.view');
});

Route::middleware(['auth', usermiddleware::class.':user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('User.dashboard');
    })->name('user.dashboard');
    Route::post('/create_blog', [BlogsController::class,'store'])->name('blogs.store');
    Route::get('/blog-list', [BlogsController::class,'list'])->name('blogs.list');
    Route::get('/blog-edit/{blog}', [BlogsController::class,'edit'])->name('blogs.edit');
    Route::post('/blog-delete/{blog}', [BlogsController::class,'destroy'])->name('blogs.destroy');
    Route::post('/blog-update/{blog}', [BlogsController::class,'update'])->name('blogs.update');

});

    Route::get('/home', [HomeController::class, 'home'])->name('blogs.frontend.list');
    Route::get('/blogs/{blog}', [HomeController::class, 'single'])->name('blogs.frontend.view');




require __DIR__.'/auth.php';
