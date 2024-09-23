<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ResetPasswordController;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/contact', 'contact')->name('contact');
Route::view('/sell', [HomeController::class, 'sell'])->name('sell');

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{user}/posts', 'user_posts')->name('posts.user');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{product}', 'show')->name('product.show');
    Route::get('/product/{user}/user', 'user_product')->name('user.product');
});

Route::view('/implement', 'dashboard.product.add-product');

Route::post('/implement', []);

Route::post('/product/{product}', function (Request $request, Product $product) {
    if ($request->submit === "cart") {
        return app(CartController::class)->store($product);
    } else {
        return Auth::check()
            ? app(CartController::class)->add_to_fav($product)
            : redirect()->back()->with('info', 'You need to be authenticated for this operation.');
    }
})->name('add.to');

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'show')->name('cart');

    Route::post('/cart/{cartItem}', 'update')->name('update.cart');
    Route::delete('/cart/{cartItem}', 'destroy')->name('delete.item');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('user.dashboard');
        Route::get('/dashboard/orders', 'orders')->name('user.orders');
        Route::get('/dashboard/transactions', 'transactions')->name('user.transactions');
        Route::get('/dashboard/chat', 'chat')->name('user.chat');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/dashboard/add-product',  'create')->name('product.create');
        Route::post('/dashboard/add-product',  'store')->name('product.store');
        Route::get('/dashboard/{id}/edit-product',  'edit')->name('product.edit');
        Route::put('/dashboard/{id}/edit-product',  'update')->name('product.update');
        Route::delete('/dashboard/{id}',  'destroy')->name('product.destroy');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('/dashboard/posts', 'all_posts')->name('user.posts');
        Route::get('/dashboard/posts/add-post', 'create')->name('post.create');
        Route::post('/dashboard/posts/add-post', 'store')->name('post.store');
        Route::get('/dashboard/posts/{id}/edit-post', 'edit')->name('post.edit');
        Route::put('/dashboard/posts/{id}/edit-post', 'update')->name('post.update');
        Route::delete('/dashboard/posts/{id}', 'destroy')->name('post.destroy');
    });

    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('user.profile');
    Route::put('/dashboard/profile', function (Request $request) {
        if ($request->update_type === 'user_info') {
            return app(DashboardController::class)->update_user_info($request);
        } else {
            return app(DashboardController::class)->update_user_password($request);
        }
    })->name('profile.update');

    Route::middleware('verified')->group(function () {});

    Route::controller(AuthController::class)->group(function () {
        Route::get('/email/verify', [AuthController::class, 'verifyEmailNotice'])->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmailHandler'])->middleware('signed')->name('verification.verify');
        Route::post('/email/verification-notification', [AuthController::class, 'verifyEmailResend'])->middleware('throttle:6,1')->name('verification.send');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

Route::middleware('guest')->group(function () {
    Route::controller(GoogleController::class)->group(function () {
        Route::get('/auth/redirect', 'redirectToGoogle')->name('google.redirect');
        Route::get('/auth/google/callback', 'handleGoogleCallback')->name('google.callback');
    });

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('user.register');

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('user.login');

    // Forgot Password Routes
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::post('/forgot-password', 'passwordEmail');
        Route::get('/reset-password/{token}', 'passwordReset')->name('password.reset');
        Route::post('/reset-password', 'passwordUpdate')->name('password.update');
    });
});
