<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Untuk menampilkan halaman
Route::get('/', function () {
    return view('index');
})->name('index');

// Untuk redirect ke Google
Route::get('login/google/redirect', [SocialiteController::class, 'redirect'])
    ->middleware(['guest'])
    ->name('redirect');

// Untuk callback dari Google
Route::get('login/google/callback', [SocialiteController::class, 'callback'])
    ->middleware(['guest'])
    ->name('callback');

// Untuk logout
Route::post('logout', [SocialiteController::class, 'logout'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('auth/signin', function () {
        return view('auth/signin');
    })->name('signin');

// HOMES
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome.index');

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::get('/profile', 'HomeController@profile')->name('home.profile');
    Route::get('/wishlist', 'HomeController@profile')->name('home.wishlist');

    Route::get('/cart', 'HomeController@cart')->name('home.cart');
    Route::post('/cartAdd', 'HomeController@cartAdd')->name('home.cartAdd');
    Route::get('/cartRemove/{idProduk}', 'HomeController@cartRemove')->name('home.cartRemove');
    Route::post('/cartUpdate', 'HomeController@cartUpdate')->name('home.cartUpdate');
    Route::get('/cartCoupon', 'HomeController@cartCoupon')->name('home.cartCoupon');

    Route::get('/produk/{idProduk}', 'HomeController@produk')->name('home.produk');

    Route::get('/reseller/{idWilayah}', 'HomeController@reseller')->name('home.reseller');
    Route::get('/resellerSet/{idReseller}', 'HomeController@resellerSet')->name('home.resellerSet');

    Route::get('/addAddress', 'HomeController@addAddress')->name('home.addAddress');

    Route::get('/news', 'HomeController@news')->name('home.news');
});
