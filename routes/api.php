<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\ForgotPasswordController;

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


Route::group(['middleware' => 'jsonify'], function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::post('users/signup', [UserController::class, 'signup']);
    Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
    Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('logout', [AuthController::class, 'logout']);

        Route::apiResource('users', UserController::class);
    });
});
