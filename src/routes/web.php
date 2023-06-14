<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
});

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v001 0614 이가원 new
 ************************************************/
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/loginpost', [UserController::class, 'loginpost'])->name('user.loginpost');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/signup', [UserController::class, 'signup'])->name('user.signup');
Route::post('/user/signuppost', [UserController::class, 'signuppost'])->name('user.signuppost');
Route::get('/user/withdraw', [UserController::class, 'withdraw'])->name('user.withdraw');