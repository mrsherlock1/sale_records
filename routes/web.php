<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SalesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/form/{id?}', [ProductController::class, 'form'])->name('product.form');
        Route::post('/form/{id?}', [ProductController::class, 'save'])->name('product.save');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::group(['prefix' => 'stock'], function () {
        Route::get('/', [StockController::class, 'index'])->name('stock.index');
        Route::get('/form/{id?}', [StockController::class, 'form'])->name('stock.form');
        Route::post('/form/{id?}', [StockController::class, 'save'])->name('stock.save');
        // Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::get('/', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/form/{id?}', [SalesController::class, 'form'])->name('sales.form');
    Route::post('/form/{id?}', [SalesController::class, 'save'])->name('sales.save');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('sales.delete');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
