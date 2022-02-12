<?php

use App\Http\Controllers\Api\BecomeAcreatorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\cartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CheckOutController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\Dashboard\Book\BookCreatorController;
use App\Http\Controllers\Api\Dashboard\DashboardController;
use App\Http\Controllers\Api\Dashboard\Income\IncomeController;
use App\Http\Controllers\Api\Dashboard\Purchased\PurchasedController;
use App\Http\Controllers\Api\Dashboard\Transaction\TransactionController;
use App\Http\Controllers\Api\FileBookController;
use App\Http\Controllers\Api\OrderNotificationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('all-category', [CategoryController::class, 'allcaregory']);
Route::get('bookrecomendation/', [BookController::class, 'bookrecomendation']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('check.role')->group(function () {

        Route::get('/me', [UserController::class, 'me']);

        Route::prefix('book')->group(function () {
            Route::get('/all-book', [BookController::class, 'allbook']);
            Route::get('/all-book-free', [BookController::class, 'allbookfree']);
            Route::get('/all-book-payment', [BookController::class, 'allbookpayment']);
            Route::get('bookauthormost/', [BookController::class, 'bookauthormost']);
            Route::get('bookrecomendation/', [BookController::class, 'bookrecomendation']);
            Route::get('/single-book/{book:slug}', [BookController::class, 'singlebook']);

            Route::prefix('creator')->group(function () {
                Route::get('my-book', [BookController::class, 'mybook']);
                Route::post('create', [BookController::class, 'createbook']);
                Route::post('bookupdate/{book:slug}', [BookController::class, 'bookupdate']);
                Route::delete('bookdelete/{book:slug}', [BookController::class, 'bookdelete']);
            });
        });
        Route::post('order/{book:slug}/{cart}', [CheckOutController::class, 'order']);
        Route::post('checkoutnotcart/{book:slug}', [CheckOutController::class, 'checkoutnotcart']);
        Route::get('orderNotification', [OrderNotificationController::class, 'orderNotification']);
        Route::patch('updateorderNotification/{order_notification}', [OrderNotificationController::class, 'updateorderNotification']);

        Route::prefix('category')->group(function () {
            Route::get('all-category', [CategoryController::class, 'allcaregory']);
            Route::get('all-tag', [CategoryController::class, 'alltag']);
            Route::get('selecttag/{category}', [CategoryController::class, 'selecttag']);
            Route::get('single-category/{category:category_name}', [CategoryController::class, 'singlecategory']);
            Route::get('categorytag/{category:category_name}', [CategoryController::class, 'categorytag']);
            Route::get('booktag/{category:category_name}/{tag:tag_name}', [CategoryController::class, 'booktag']);
        });
        Route::prefix('file')->group(function () {
            Route::get('all-file', [FileBookController::class, 'allfile']);
        });

        Route::prefix('comment')->group(function () {
            Route::get('all-comment/{book:slug}', [CommentsController::class, 'comment']);
        });

        Route::prefix('becomeacreator')->group(function () {
            Route::post('/', [BecomeAcreatorController::class, 'becomeacreator']);
        });

        Route::prefix('cart')->group(function () {
            Route::get('/getcart', [cartController::class, 'getcart']);
            Route::get('/checkcart', [cartController::class, 'checkcart']);
            Route::post('addcart/{book:slug}', [cartController::class, 'addcart']);
            Route::delete('deletecart/{cart}', [cartController::class, 'deletecart']);
        });

        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'dashboard']);
            Route::prefix('book')->group(function () {
                Route::get('/', [BookCreatorController::class, 'bookcreator']);
                Route::get('/top-book', [BookCreatorController::class, 'topbookcreator']);
            });
            Route::prefix('purchased')->group(function () {
                Route::get('/', [PurchasedController::class, 'purchased']);
            });
            Route::prefix('transaction')->group(function () {
                Route::get('/', [TransactionController::class, 'transaction']);
            });
            Route::prefix('income')->group(function () {
                Route::get('/', [IncomeController::class, 'income']);
                Route::post('/widraw', [IncomeController::class, 'widraw']);
            });
        });
    });
});
