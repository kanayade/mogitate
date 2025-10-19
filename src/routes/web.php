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
// 商品登録画面
Route::get('/register',[ProductController::class,'add']);
// 商品登録実行
Route::post('/register',[ProductController::class,'store']);
// 商品詳細画面
Route::get('/products/{productId}',[ProductController::class,'edit']);
// 商品更新
Route::post('/products/{productId}/update',[ProductController::class,'update']);

// 削除処理
// Route::delete('/products/{productsId}',[ProductController::class,'destroy']);
// 商品検索
// Route::get('/products',[ProductController::class,'search']);