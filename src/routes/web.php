<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenApiController;

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

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v001 0614 신유진 new
 ************************************************/
// Board
Route::resource('/board', BoardController::class);
// GET|HEAD        board ............................................................. board.index › BoardController@index
// POST            board ............................................................. board.store › BoardController@store
// GET|HEAD        board/create .................................................... board.create › BoardController@create
// GET|HEAD        board/{board} ....................................................... board.show › BoardController@show
// PUT|PATCH       board/{board} ................................................... board.update › BoardController@update
// DELETE          board/{board} ................................................. board.destroy › BoardController@destroy
// GET|HEAD        board/{board}/edit .................................................. board.edit › BoardController@edit

// #routes/web.php
// code
// Route::get('/', 'HomeController@index');

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v001 0614 박진영 new
 ************************************************/
Route::post('/api/store', [OpenApiController::class, 'store']);
Route::get('/api/store', [OpenApiController::class, 'store']);

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v001 0614 김재성 new
 ************************************************/

 // 메인페이지 이동
Route::get('main', [MainController::class, 'main'])->name('main');
// 축제리시트 페이지 이동
Route::get('feslist', [MainController::class, 'fesList'])->name('main.fesList');
// 공지페이지 이동
Route::get('noticepage', [MainController::class, 'noticePage'])->name('main.noticePage');
