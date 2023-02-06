<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['guest'])->group(function(){
    // Index
    Route::get('/index', [HomeController::class, 'index'])->name('index');
    Route::get('/{lang}/index', [HomeController::class, 'index_lang'])->name('indexLang');

    // Login
    Route::get('/login', [UserController::class, 'login_form'])->name('login_form');
    Route::post('/login/action', [UserController::class, 'login_logic'])->name('login_logic');

    // Register
    Route::get('/register', [UserController::class, 'register_form'])->name('register_form');
    Route::post('/register/action', [UserController::class, 'register_logic'])->name('register_logic');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    // Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // Products
    Route::get('/detail/{id}', [ItemController::class, 'detail']);

    // Cart
    Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
    Route::post('/cart/add', [OrderController::class, 'add_to_cart'])->name('add_to_cart');
    Route::delete('/cart/delete', [OrderController::class, 'delete_item_cart'])->name('delete_item_cart');
    Route::post('/cart/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'update_logic'])->name('update_logic');
});

Route::middleware(['admin'])->group(function(){
    // Account Maintenance
    Route::get('/account_maintenance', [UserController::class, 'account_maintenance'])->name('account_maintenance');
    Route::delete('/account_maintenance/delete', [UserController::class, 'delete_account'])->name('delete_account');
    Route::get('/account_maintenance/update', [UserController::class, 'update_role_form'])->name('update_role_form');
    Route::patch('/account_maintenance/update/action', [UserController::class, 'update_role'])->name('update_role');
});
