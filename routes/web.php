<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
/*
|--------------------------------------------------------------------------
| 🔐 Auth + 🛠️ Admin Panel Routes
|--------------------------------------------------------------------------
| Yönetici kullanıcılar için erişilebilen panel rotalarıdır.
| `auth` + `administration` middleware'leri uygulanır.
| Route isimleri `administration.` prefix'i ile başlar.
*/
Route::group(['middleware' => ['auth', 'administration']], static function () {
    Route::group(['as' => 'administration.', 'prefix' => 'administration'], static function ($router) {
        // 📝 Bloglar
        $router->resource('blogs', BlogController::class)->except('show');
    });
});

/*
|--------------------------------------------------------------------------
| 🌐 Public Routes
|--------------------------------------------------------------------------
| Giriş gerektirmeyen genel sayfalardır. (SEO + tanıtım)
| Ziyaretçiler tarafından erişilebilir.
*/
Route::group([], static function ($router) {

    $router->get('/', [PageController::class, 'home'])->name('home');

    // 📝 Blog
    $router->get('yazilar', [BlogController::class, 'blogs'])->name('blogs');
    $router->get('yazilar/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

    // auth routes
    $router->get('login', [LoginController::class, 'login'])->name('login');
    $router->post('login', [LoginController::class, 'authenticate'])->name('login.post');
    $router->get('register', [RegisterController::class, 'register'])->name('register');
    $router->post('register', [RegisterController::class, 'register'])->name('register.post');
    $router->get('forgot-password', [PasswordResetController::class, 'request'])->name('password.request');
    $router->post('forgot-password', [PasswordResetController::class, 'email'])->name('password.email');
    $router->get('reset-password/{token}', [PasswordResetController::class, 'reset'])->name('password.reset');
    $router->post('reset-password', [PasswordResetController::class, 'update'])->name('password.update');

});


Route::middleware('auth')->group(function ($router) {
    $router->post('/logout', [LoginController::class, 'logout'])->name('logout');
    $router->get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});
