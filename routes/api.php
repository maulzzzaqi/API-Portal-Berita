<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->group(function(){
    // News
    Route::get('/posts', [PostController::class, 'index'])->middleware(['auth:sanctum']);
    Route::get('/postsindex', [PostController::class, 'index2'])->middleware(['auth:sanctum']);
    Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth:sanctum']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware(['post.owner']);
    Route::delete('/posts/{id}', [PostController::class, 'delete'])->middleware(['post.owner']);

    // Comments
    Route::post('/comment', [CommentController::class, 'store']);
    Route::post('/comment/{id}', [CommentController::class, 'update'])->middleware('comment.owner');

    // Auth
    Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/account', [AuthenticationController::class, 'account'])->middleware('auth:sanctum');
});

Route::get('/posts2/{id}', [PostController::class, 'show2']);
Route::post('/login', [AuthenticationController::class, 'login']);