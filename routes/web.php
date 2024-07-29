<?php

use App\Http\Controllers\CatelogueController;
use App\Http\Controllers\client\HomeControllers;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin/dashboard');
        });
        Route::prefix('catelogue')
            ->as('catelogue.')
            ->group(function () {
                Route::get('index', [CatelogueController::class, 'index'])->name('index');
                Route::get('create', [CatelogueController::class, 'create'])->name('create');
                Route::post('store', [CatelogueController::class, 'store'])->name('store');
                Route::get('show/{id}', [CatelogueController::class, 'show'])->name('show');
                Route::get('{id}/edit', [CatelogueController::class, 'edit'])->name('edit');
                Route::put('update/{id}', [CatelogueController::class, 'update'])->name('update');
                Route::get('{id}destroy', [CatelogueController::class, 'destroy'])->name('destroy');
            });
        Route::prefix('product')
            ->as('product.')
            ->group(function () {
                Route::get('index', [ProductController::class, 'index'])->name('index');
                Route::get('create', [ProductController::class, 'create'])->name('create');
                Route::post('store', [ProductController::class, 'store'])->name('store');
                Route::get('show/{id}', [ProductController::class, 'show'])->name('show');
                Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit');
                Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
                Route::get('{id}destroy', [ProductController::class, 'destroy'])->name('destroy');
            });
    });
    Route::get('/', [HomeControllers::class, 'index'])->name('index');
Route::prefix('client')
    ->as('client.')
    ->group(function () {
      
        Route::get('create/{id}', [HomeControllers::class, 'create'])->name('create');
        Route::get('product/{id}', [HomeControllers::class, 'product'])->name('product');
        Route::get('listCart', [HomeControllers::class, 'listCart'])->name('listCart');
        
        Route::post('cart', [HomeControllers::class, 'cart'])->name('cart');
        // Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit');
        // Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
        // Route::get('{id}destroy', [ProductController::class, 'destroy'])->name('destroy');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
