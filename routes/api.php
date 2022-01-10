<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('ceklogin', [UserController::class, 'ceklogin']);

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'categoryindex']);
        Route::post('/create', [CategoryController::class, 'categorycreate']);
        Route::get('/detail/{category:slug}', [CategoryController::class, 'categorydetail']);
        Route::patch('/update/{category:slug}', [CategoryController::class, 'categoryupdate']);
        Route::delete('/delete/{category:slug}', [CategoryController::class, 'categorydelete']);
    });

    Route::prefix('tag')->group(function () {
        Route::get('/', [TagController::class, 'tagindex']);
        Route::post('/create', [TagController::class, 'tagcreate']);
        Route::get('/detail/{tag:slug}', [TagController::class, 'tagdetail']);
        Route::patch('/update/{tag:slug}', [TagController::class, 'tagupdate']);
        Route::delete('/delete/{tag:slug}', [TagController::class, 'tagdelete']);
    });
    Route::prefix('author')->group(function () {
        Route::get('/', [AuthorController::class, 'authorindex']);
        Route::post('/create', [AuthorController::class, 'authorcreate']);
        Route::get('/detailsas/{author}', [AuthorController::class, 'authordetail']);
        Route::patch('/update/{author}', [AuthorController::class, 'authorupdate']);
        Route::delete('/delete/{author}', [AuthorController::class, 'authordelete']);
    });
});
