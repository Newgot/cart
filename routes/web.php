<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BasketController;

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

Route::get('/', [ProductController::class, 'index'])
    ->name('home');

Route::get('/add-product', [ProductController::class, 'renderAddForm'])
    ->name('product.addForm');
Route::post('/add', [ProductController::class, 'add'])
    ->name('product.addRequest');

Route::view('add-category', 'category.add')
    ->name('category.addForm');
Route::post('add-category', [CategoryController::class, 'add'])
    ->name('category.addRequest');

Route::get('/basket', [BasketController::class, 'index'])
    ->name('basket.index');

Route::post('/add-to-busket', [BasketController::class, 'addToBusket'])
    ->name('addToBusket');

Route::post('/del-to-busket', [BasketController::class, 'delToBusket'])
    ->name('delToBusket');

Route::post('/remove-to-busket', [BasketController::class, 'removeToBusket'])
    ->name('removeToBusket');


Route::post('/send-mail', [BasketController::class, 'sendMail'])
    ->name('sendMail');
