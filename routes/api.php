<?php

use App\Http\Controllers\API\AccountAPIController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserAPIController;
use Illuminate\Http\Request;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('register_client', [AuthController::class, 'registerClient']);
Route::post('register_agent', [AuthController::class, 'registerAgent']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', UserAPIController::class)->except(['store', 'create']);

Route::resource('accounts', AccountAPIController::class);


Route::resource('depts', App\Http\Controllers\API\DeptAPIController::class);


Route::resource('user_accounts', App\Http\Controllers\API\UserAccountAPIController::class);


Route::resource('transactions', App\Http\Controllers\API\TransactionAPIController::class);
