<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
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
        //Like
        Route::get('/users/{user}/tweets/{tweet}/{action}', [LikeController::class, 'likeOrDislikeTweet']);

        //Tweet
        Route::get('/users/{user}/tweets', [TweetController::class, 'userTweet']);
        Route::apiResource('/tweets', TweetController::class)->only(['index', 'store', 'show']);

        //Follow
        Route::get('/users/{user}/followers', [FollowerController::class, 'userFollower']);
        Route::get('/users/{user}/following', [FollowerController::class, 'userFollowing']);
        Route::post('/users/{user}/follow', [FollowerController::class, 'follow']);
        Route::post('/users/{user}/unfollow', [FollowerController::class, 'unFollow']);

        //User
        Route::get('/users/random', [UserController::class, 'getRandomUsers']);
        Route::apiResource('/users', UserController::class)->only(['index', 'show']);

    });

});
