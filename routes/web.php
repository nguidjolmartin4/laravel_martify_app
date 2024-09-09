<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/sell', [HomeController::class, 'sell'])->name('sell');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/contact', 'contact')->name('contact');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{user}/posts', [PostController::class, 'user_posts'])->name('posts.user');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('auth/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Routes for the Auth Users
Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
        Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('user.orders');
        Route::get('/dashboard/transactions', [DashboardController::class, 'transactions'])->name('user.transactions');
        Route::get('/dashboard/chat', [DashboardController::class, 'chat'])->name('user.chat');

        Route::get('/dashboard/add-product', [ProductController::class, 'create'])->name('product.create');
        Route::post('/dashboard/add-product', [ProductController::class, 'store'])->name('product.store');
        Route::get('/dashboard/{id}/edit-product', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/dashboard/{id}/edit-product', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/dashboard/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

        Route::get('/dashboard/posts', [PostController::class, 'all_posts'])->name('user.posts');
        Route::get('/dashboard/posts/add-post', [PostController::class, 'create'])->name('post.create');
        Route::post('/dashboard/posts/add-post', [PostController::class, 'store'])->name('post.store');
        Route::get('/dashboard/posts/{id}/edit-post', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/dashboard/posts/{id}/edit-post', [PostController::class, 'update'])->name('post.update');
        Route::delete('/dashboard/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');

        Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('user.profile');
        Route::put('/dashboard/profile', function (Request $request) {
            if ($request->update_type === 'user_info') {
                return app(DashboardController::class)->update_user_info($request);
            } else {
                return app(DashboardController::class)->update_user_password($request);
            }
        })->name('profile.update');
    });

    Route::get('/email/verify', [AuthController::class, 'verifyEmailNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmailHandler'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'verifyEmailResend'])->middleware('throttle:6,1')->name('verification.send');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Routes for the Guest Users
Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('user.register');

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', function (Request $request) {
        if ($request->login_type === 'admin') {
            return app(AdminController::class)->login($request);
        } else {
            return app(AuthController::class)->login($request);
        }
    })->name('user.login');

    // Forgot Password Routes
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});
