<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartitemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/banner', [BannerController::class,'index']);
Route::post('/banner', [BannerController::class,'store']);
Route::post('/banner/{id}',[BannerController::class,'update']);
Route::delete('/banner/{id}',[BannerController::class,'destroy']);

Route::get('/user', [UserController::class,'index']);
Route::post('/user',[UserController::class,'store']);

Route::get('/product',[ProductController::class,'index']);
Route::post('/product',[ProductController::class,'store']);
Route::post('/product/{id}',[ProductController::class,'update']);
Route::delete('/product/{id}',[ProductController::class,'destroy']);
Route::get('/product/{id}',[ProductController::class,'show']);

Route::get('/order',[OrderController::class,'index']);
Route::post('/order',[OrderController::class,'store']);
Route::post('/order/{id}',[OrderController::class,'update']);
Route::delete('/order/{id}',[OrderController::class,'destroy']);
Route::get('/order/{id}',[OrderController::class,'show']);

Route::get('/cart',[CartController::class, 'index']);
Route::post('/cart',[CartController::class, 'store']);
Route::post('/cart/{id}',[CartController::class, 'update']);
Route::delete('/cart/{id}',[CartController::class, 'destroy']);
Route::get('/cart/{id}',[CartController::class, 'show']);

Route::get('/cartitem',[CartitemController::class, 'index']);
Route::post('/cartitem',[CartitemController::class, 'store']);
Route::post('/cartitem/{id}',[CartitemController::class, 'update']);
Route::delete('/cartitem/{id}',[CartitemController::class, 'destroy']);
Route::get('/cartitem/{id}',[CartitemController::class, 'show']);