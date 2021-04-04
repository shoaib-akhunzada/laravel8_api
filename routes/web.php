<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('forgot-password', [ForgotPasswordController::class, 'index']);
Route::post('forgot-password-verify', [ForgotPasswordController::class, 'forgotPassword']);

Route::get('reset-password/{token}', [ResetPasswordController::class, 'index']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);
