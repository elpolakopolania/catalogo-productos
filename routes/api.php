<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\ProductController as ProductV1;
use App\Http\Controllers\Api\V1\TrademarkController as TradeMarkV1;
use App\Http\Controllers\Api\LoginController as Login;

Route::apiResource('v1/products', ProductV1::class)
    ->only(['show', 'index', 'destroy', 'store', 'update'])/*->middleware('auth:sanctum')*/;

Route::apiResource('v1/trademarks', TradeMarkV1::class)
    ->only(['show', 'index', 'destroy','store', 'update'])/*->middleware('auth:sanctum')*/;

Route::post('login',[Login::class, 'login']);
Route::post('logout',[Login::class, 'logout'])->middleware('auth:sanctum');
