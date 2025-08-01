<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::match(['get', 'post'], '/', function () {
    return "Cette route accepte GET et POST";
});
Route::get('/api/product', [ProductController::class, 'index']);
