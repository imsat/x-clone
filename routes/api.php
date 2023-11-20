<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
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

Route::prefix('/v1')->group(function () {
    //Authentication Section
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/register', [RegisterController::class, 'register']);


    Route::middleware('auth:api')->group(function () {
        //Series
        Route::apiResource('/tweets', TweetController::class)->only(['store', 'show']);

        //Follow
        Route::post('/users/{user}/follow', [FollowerController::class, 'follow']);
        Route::post('/users/{user}/unfollow', [FollowerController::class, 'unFollow']);

        //User list
        Route::get('/users', [UserController::class, 'index']);

    });

});
