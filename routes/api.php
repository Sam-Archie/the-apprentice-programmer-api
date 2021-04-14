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
    Route::post("", [PostController::class, "store"]);

    Route::group(["prefix" => "{post}"], function() {
        Route::get("", [PostController::class, "show"]);
        Route::put("", [PostController::class, "update"]);
        Route::delete("", [PostController::class, "destroy"]);

        Route::group(["prefix" => "tags"], function() {
            Route::put("", [TagController::class, "update"]);
            Route::delete("", [TagController::class, "destroy"]);
        });

        Route::group(["prefix" => "comments"], function() {
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
        Route::put("", [UserController::class, "update"]);
        Route::delete("", [UserController::class, "destroy"]);
    });
});