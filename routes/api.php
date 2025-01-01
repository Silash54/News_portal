<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('categories', [ApiController::class, 'categories']);
Route::get('company', [ApiController::class, 'company']);
Route::get('trending-posts', [ApiController::class, 'trending_posts']);
Route::get('category/{slug}', [ApiController::class, 'category']);
Route::post('create-category', [ApiController::class, 'create_Category']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('logout', [AuthController::class, 'logout']);
    Route::apiResource('post', PostController::class)->names('posts');
});
