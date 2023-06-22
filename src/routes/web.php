<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoticeController;
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
Route::post('/user/withdrawpost', [UserController::class, 'withdrawpost'])->name('user.withdrawpost');
Route::get('/user/main', [UserController::class, 'usermain'])->name('user.main');
Route::get('/user/edit', [UserController::class, 'useredit'])->name('user.edit');
Route::get('/user/pwchk', [UserController::class, 'pwchk'])->name('pwchk');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::post('/user/pwchkpost', [UserController::class, 'pwchkpost'])->name('pwchkpost');
Route::get('/user/terms', [UserController::class, 'terms'])->name('user.terms');
Route::post('/user/termspost', [UserController::class, 'termspost'])->name('user.termspost');

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

// Notice
Route::get('/notice', [NoticeController::class , 'index'])->name('notice.index');

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v001 0614 박진영 new
 ************************************************/
Route::get('/api/store', [OpenApiController::class, 'store']);
Route::get('fesdetail/{id}', [MainController::class, 'fesDetail'])->name('fes.detail');

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v001 0614 김재성 new
 ************************************************/

 // 메인페이지 이동(비로그인)
Route::get('main', [MainController::class, 'main'])->name('main');
//  // 메인페이지 이동(로그인)
// Route::get('main/{id}', [MainController::class, 'mainUse'])->name('main.use'); // 0620 이가원 del
// 축제리시트 페이지 이동
Route::get('feslist', [MainController::class, 'fesList'])->name('main.fesList');
// 공지페이지 이동
// Route::get('noticepage', [MainController::class, 'noticePage'])->name('main.noticePage'); // 0621 신유진 del
// 더보기로 축제리스트페이지 이동
Route::get('fesorder/{id}', [MainController::class, 'fesOrder'])->name('main.FesOrder');
//검색결과 페이지 이동
Route::post('search', [MainController::class, 'search'])->name('main.search');
//축체 요청 페이지 이동
Route::get('request', [MainController::class, 'fesRequest'])->name('main.request');
//로그아웃
Route::get('logout', [MainController::class, 'logout'])->name('main.logout');
//찜인서트
Route::post('jjm', [FavoriteController::class, 'jjmPost'])->name('favorite.jjm');
