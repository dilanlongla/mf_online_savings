<?php

use App\Http\Controllers\SendSMSController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('send-sms', [SendSMSController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('transactions', App\Http\Controllers\TransactionController::class);


Route::resource('accounts', App\Http\Controllers\AccountController::class);


Route::resource('activityLogs', App\Http\Controllers\ActivityLogController::class);


Route::resource('depts', App\Http\Controllers\DeptsController::class);


Route::resource('roles', App\Http\Controllers\RolesController::class);


Route::resource('users', App\Http\Controllers\UsersController::class);


Route::resource('userAcccounts', App\Http\Controllers\UserAcccountsController::class);
