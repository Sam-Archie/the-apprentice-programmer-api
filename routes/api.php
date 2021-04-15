<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["prefix" => "/posts"], function() {
    Route::get("", [PostController::class, "index"]);
    Route::post("", [PostController::class, "store"])->middleware('auth:api');

    Route::group(["prefix" => "{post}"], function() {
        Route::get("", [PostController::class, "show"]);
        Route::put("", [PostController::class, "update"])->middleware('auth:api');
        Route::delete("", [PostController::class, "destroy"])->middleware('auth:api');

        Route::group(["prefix" => "comments", "middleware" => ["auth:api"]], function() {
            Route::post("", [CommentController::class, "store"]);
            Route::put("", [CommentController::class, "update"]);
            Route::delete("", [CommentController::class, "destroy"]);
        });
    });
});

Route::group(["prefix" => "/users"], function() {
    Route::get("", [UserController::class, "index"]);
    Route::post("", [UserController::class, "store"]);

    Route::group(["prefix" => "{user}"], function() {
        Route::get("", [UserController::class, "show"]);
        Route::put("", [UserController::class, "update"])->middleware('auth:api');
        Route::delete("", [UserController::class, "destroy"])->middleware('auth:api');
    });
});