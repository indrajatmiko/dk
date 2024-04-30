<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustAddressController;
use App\Http\Controllers\PesananController;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;
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
// Route::get('/', function () {
//     return view('index');
// })->name('index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');

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

Route::get('/testroute', function() {
    $name = "DK";

    // The email sending is done using the to method on the Mail facade
    Mail::to('indrajatmiko@gmail.com')->send(new KirimEmail($name));
});

// HOMES
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/produk/{idProduk}', [HomeController::class, 'produk'])->name('home.produk');

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth']], function () {
    Route::get('/profile', 'HomeController@profile')->name('home.profile');
    Route::get('/faq', 'HomeController@faq')->name('home.faq');

    Route::get('/cart', 'HomeController@cart')->name('home.cart');
    Route::post('/cartAdd', 'HomeController@cartAdd')->name('home.cartAdd');
    Route::get('/cartRemove/{idProduk}', 'HomeController@cartRemove')->name('home.cartRemove');
    Route::post('/cartUpdate', 'HomeController@cartUpdate')->name('home.cartUpdate');
    Route::get('/cartCoupon', 'HomeController@cartCoupon')->name('home.cartCoupon');


    Route::get('/reseller/{idWilayah}', 'HomeController@reseller')->name('home.reseller');
    Route::get('/resellerSet/{idReseller}', 'HomeController@resellerSet')->name('home.resellerSet');

    Route::get('/addAddress', 'HomeController@addAddress')->name('home.addAddress');
    Route::get('/getCities/{provinceId}', 'HomeController@getCities')->name('home.getCities');
    Route::get('/getSubdistricts/{cityId}', 'HomeController@getSubdistricts')->name('home.getSubdistricts');
    Route::get('/cekOngkir/{origin}/{destination}/{weight}', 'HomeController@cekOngkir')->name('home.cekOngkir');

    Route::post('/custAddressStore', 'CustAddressController@store')->name('custAddress.store');
    Route::get('/custSelectAddress', 'CustAddressController@selectAddress')->name('custAddress.selectAddress');
    Route::post('/setAddress', 'CustAddressController@setAddress')->name('custAddress.setAddress');

    Route::get('/checkout', 'HomeController@checkout')->name('home.checkout');
    Route::get('/payment', 'HomeController@payment')->name('home.payment');
    Route::post('/setPayment', 'HomeController@setPayment')->name('home.setPayment');
    Route::get('/ongkir', 'HomeController@ongkir')->name('home.ongkir');
    Route::post('/setOngkir', 'HomeController@setOngkir')->name('home.setOngkir');

    Route::post('/pesananStore', 'PesananController@store')->name('pesanan.store');
    Route::get('/myOrder', 'PesananController@myOrder')->name('pesanan.myOrder');
    Route::get('/paymentOrder/{idPesanan}', 'PesananController@paymentOrder')->name('pesanan.paymentOrder');

    Route::get('/tesEmail', 'PesananController@tesEmail')->name('pesanan.email');
    Route::get('/tesTemplate', 'PesananController@tesTemplate')->name('pesanan.tesTemplate');

    Route::get('/news', 'HomeController@news')->name('home.news');
});
