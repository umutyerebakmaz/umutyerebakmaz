<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
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

});