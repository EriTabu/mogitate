<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


// トップページ
Route::get('/', [ProductController::class, 'index']);


// 商品一覧
Route::get('/products', [ProductController::class, 'index']);


// 商品編集画面
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);


// 商品更新
Route::put('/products/{id}', [ProductController::class, 'update']);


// 商品詳細
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::delete('/products/{product}', [ProductController::class, 'destroy']);