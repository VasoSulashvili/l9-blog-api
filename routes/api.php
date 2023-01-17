<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('tokens/create', [AuthController::class, 'tokenCreate']);


Route::group([
    'middleware' => ['auth:sanctum'],
    'as' => 'api'], function(){

    Route::resources([
        'articles' => ArticleController::class,
        'categories' => CategoryController::class,
        'comments' => CommentController::class,
        'tags' => TagController::class
    ]);
    
});
