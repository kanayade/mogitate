<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
// 商品一覧
Route::get('/products',[ProductController::class,'index']);
// 商品登録
Route::get('/register',[ProductController::class,'add']);
Route::post('/register',[ProductController::class,'create']);
// 商品検索
// Route::get('/products',[ProductController::class,'search']);
// 商品詳細
Route::get('/products/{productId}',[ProductController::class,'edit']);
// 商品更新
Route::post('/products/{productId}/update',[ProductController::class,'update']);