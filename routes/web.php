<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;


Route::middleware('guest')->group(static function ($route) {
    $route->get('login', [LoginController::class, 'login'])->name('login');
    $route->post('login', [LoginController::class, 'store'])->middleware('throttle:login')->name('login.store');
    $route->get('register', [RegisterController::class, 'register'])->name('register');
    $route->post('register', [RegisterController::class, 'store'])->name('register.store');
});


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
        $router->get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        $router->resource('blogs', BlogController::class)->except('show');
    });
});

/*
|--------------------------------------------------------------------------
| 🌐 (web middleware) Public Routes
|--------------------------------------------------------------------------
| Giriş gerektirmeyen genel sayfalardır. (SEO + tanıtım)
| Ziyaretçiler tarafından erişilebilir.
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('yazilar', [BlogController::class, 'blogs'])->name('blogs');
Route::get('yazilar/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');


Route::middleware('auth')->group(function ($router) {
    $router->post('logout', [LoginController::class, 'logout'])->name('logout');
});
