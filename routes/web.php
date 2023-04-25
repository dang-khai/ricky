<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LogoutController;

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

Route::get('/', function () {
    return view('app');
})->name('home');

Route::prefix('api')->middleware('guest')->group(function () {
    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class)->name('login');
});

Route::prefix('api/admin')->middleware('role')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('subcategories', SubCategoryController::class);
});

Route::prefix('api')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('order', OrderController::class);
    Route::resource('cart', CartController::class);
    Route::resource('users', UserController::class);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::get('/{any}.html', function ($any) {
    if (! View::exists('template.' . $any)) {
        abort(404);
    }
    return view('template.' . $any);
})->where('any', '.*');
