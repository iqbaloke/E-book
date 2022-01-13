<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\cartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Dashboard\Book\BookCreatorController;
use App\Http\Controllers\Api\Dashboard\DashboardController;
use App\Http\Controllers\Api\Dashboard\Income\IncomeController;
use App\Http\Controllers\Api\Dashboard\Purchased\PurchasedController;
use App\Http\Controllers\Api\Dashboard\Transaction\TransactionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('check.role')->group(function () {

        Route::get('/me', [UserController::class, 'me']);

        Route::prefix('book')->group(function () {
            Route::get('/all-book', [BookController::class, 'allbook']);
            Route::get('bookauthormost/', [BookController::class, 'bookauthormost']);
            Route::get('bookrecomendation/', [BookController::class, 'bookrecomendation']);
            Route::get('/single-book/{book:slug}', [BookController::class, 'singlebook']);
        });

        Route::prefix('category')->group(function () {
            Route::get('all-category', [CategoryController::class, 'allcaregory']);
            Route::get('single-category/{category:category_name}', [CategoryController::class, 'singlecategory']);
            Route::get('{category:category_name}/{tag:tag_name}', [CategoryController::class, 'categorytag']);
        });

        Route::prefix('cart')->group(function () {
            Route::get('/getcart', [cartController::class, 'getcart']);
            Route::post('addcart/{book:slug}', [cartController::class, 'addcart']);
            Route::delete('deletecart/{cart}', [cartController::class, 'deletecart']);
        });

        Route::prefix('dashboard')->group(function(){
            Route::get('/',[DashboardController::class,'dashboard']);
            Route::prefix('book')->group(function(){
                Route::get('/', [BookCreatorController::class,'bookcreator']);
            });
            Route::prefix('purchased')->group(function(){
                Route::get('/', [PurchasedController::class,'purchased']);
            });
            Route::prefix('transaction')->group(function(){
                Route::get('/', [TransactionController::class,'transaction']);
            });
            Route::prefix('income')->group(function(){
                Route::get('/', [IncomeController::class,'income']);
            });
        });

    });
});
