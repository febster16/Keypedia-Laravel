<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [PageController::class, 'home'])->middleware('guest');

Route::post('/login', [PageController::class, 'login'])->name('login');

Route::get('/login', [PageController::class, 'index'])->middleware('guest');

Route::post('/register', [PageController::class, 'register']);

Route::get('/register', [PageController::class, 'registerForm']);

Route::get('/logout', [PageController::class, 'logout']);

Route::get('/homeManager', [PageController::class, 'homeManager'])->middleware('manager');

Route::get('/home', [PageController::class, 'home']);

Route::get('/category/{id}', [ProductController::class, 'getCategory']);

Route::get('/search', [ProductController::class, 'viewSearch']);

Route::get('/product/{id}', [ProductController::class, 'getProduct']);

Route::post('/cart', [CartController::class, 'addToCart'])->middleware('auth');

Route::get('/myCart', [CartController::class, 'getCart'])->middleware('auth');

Route::post('/updateCart', [CartController::class, 'updateCart'])->middleware('auth');

Route::post('/checkout/{id}', [CartController::class, 'checkout'])->middleware('auth');

Route::get('/transactionHistory', [TransactionController::class, 'getTransaction'])->middleware('auth');

Route::get('/transactionDetail/{id}', [TransactionController::class, 'getTransactionDetail'])->middleware('auth');

Route::get('/changePassword', [PageController::class, 'changePassword'])->middleware('auth');

Route::post('/changePassword', [PageController::class, 'updatePassword'])->middleware('auth');

Route::get('/updateProduct/{id}', [ProductController::class, 'updateProductPage'])->middleware('auth');

Route::post('/updateProduct', [ProductController::class, 'updateProduct'])->middleware('auth');

Route::post('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->middleware('auth');

Route::get('/addKeyboard', [ProductController::class, 'addKeyboardPage'])->middleware('auth');

Route::post('/addKeyboard', [ProductController::class, 'addKeyboard'])->middleware('auth');

Route::get('/manageCategory', [CategoryController::class, 'manageCategoryPage'])->middleware('auth');

Route::post('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->middleware('auth');

Route::get('/updateCategory/{id}', [CategoryController::class, 'updateCategoryPage'])->middleware('auth');

Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->middleware('auth');
