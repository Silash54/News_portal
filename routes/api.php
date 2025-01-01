<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('categories', [ApiController::class, 'categories']);
Route::get('company', [ApiController::class, 'company']);
Route::get('trending-posts', [ApiController::class, 'trending_posts']);
Route::get('category/{slug}', [ApiController::class, 'category']);
Route::post('create-category',[ApiController::class,'create_Category']);
Route::apiResource('post', PostController::class)->names('posts');
Route::post('register',[AuthController::class,'register'])->name('register');
