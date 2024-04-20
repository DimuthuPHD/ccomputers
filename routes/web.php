<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FfrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\Auth\LoginController;
use App\Http\Controllers\FrontEnd\Auth\RegisterController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\CustomerController;
use App\Http\Controllers\FrontEnd\HomeController as FrontEndHomeController;
use App\Http\Controllers\FrontEnd\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['as' => 'fr.'], function () {
    Route::get('/', [FrontEndHomeController::class, 'index'])->name('home');
    Route::get('/customer/login', [LoginController::class, 'showLoginForm']);
    Route::post('/customer/login', [LoginController::class, 'login'])->name('customer.login');
    Route::get('/customer/register', [RegisterController::class, 'showRegistrationForm'])->name('customer.register');
    Route::post('/customer/register', [RegisterController::class, 'register'])->name('customer.register.submit');

    Route::get('store', [StoreController::class, 'index'])->name('store');
    Route::get('store/product/{product}', [StoreController::class, 'show'])->name('store.product');

    Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('cart/{product}/delete', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');



    Route::group(['middleware' => 'auth:customer', 'prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
        Route::post('logout', [LoginController::class, 'logout'])->name('customer.logout');
    });

});

Auth::routes();

Route::group(['middleware' => 'auth:web', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/media/{media}/delete', [ProductController::class, 'removeMedia'])->name('products.delete.images');
});
