<?php

use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenApiController;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

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
Route::get('/user/pwchk/{id}', [UserController::class, 'pwchk'])->name('pwchk');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::post('/user/pwchkpost', [UserController::class, 'pwchkpost'])->name('pwchkpost');
Route::get('/user/terms', [UserController::class, 'terms'])->name('user.terms');
Route::post('/user/termspost', [UserController::class, 'termspost'])->name('user.termspost');
Route::get('/user/favorites', [UserController::class, 'favorites'])->name('user.favorites');
Route::get('/user/articles', [UserController::class, 'articles'])->name('user.articles');
Route::get('/user/comments', [UserController::class, 'comments'])->name('user.comments');

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
Route::post('/board/search', [BoardController::class, 'search'])->name('board.search');
// Notice
Route::get('/notice', [NoticeController::class , 'index'])->name('notice.index');
Route::get('/notice/{id}', [NoticeController::class , 'show'])->name('notice.show');
Route::post('/notice/search', [NoticeController::class, 'search'])->name('notice.search');

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
Route::get('/', [MainController::class, 'main'])->name('main');
// 축제리시트 페이지 이동
Route::get('feslist', [MainController::class, 'fesList'])->name('main.fesList');
// 더보기로 축제리스트페이지 이동
Route::post('feslist/', [MainController::class, 'fesOrder'])->name('main.FesOrder');
//검색결과 페이지 이동
Route::post('search', [MainController::class, 'search'])->name('main.search');
//검색결과 페이지 이동
Route::get('search', [MainController::class, 'searchGet'])->name('main.searchGet');
//축체 요청 페이지 이동
Route::get('request', [MainController::class, 'fesRequest'])->name('main.request');
//로그아웃
Route::get('logout', [MainController::class, 'logout'])->name('main.logout');
//찜인서트
Route::post('jjm', [FavoriteController::class, 'jjmPost'])->name('favorite.jjm');
//찜 삭제
Route::delete('jjm', [FavoriteController::class, 'jjmDel'])->name('favorite.jjm');

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v002 0714 김재성 new
 ************************************************/

Route::get('/regist/mail', [MailSendController::class, 'index'])->name('regist.mail');
Route::get('/regist/mail/{token}', [UserController::class, 'terms'])->name('mail.terms');
Route::post('/send', [MailSendController::class, 'registMail'])->name('mail.send');


/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v002 0714 이가원 new
 ************************************************/

Route::get('admin/report', [AdminReportController::class, 'reportget'])->name('admin.report');
Route::post('admin/report', [AdminReportController::class, 'reportpost'])->name('report.post');
Route::get('report', [AdminReportController::class, 'insertget'])->name('insert.report');
Route::post('report', [AdminReportController::class, 'insertpost'])->name('insert.post');
Route::get('admin/articled', [AdminReportController::class, 'articleget'])->name('report.article');
Route::get('admin/commentd', [AdminReportController::class, 'commentget'])->name('report.comment');
Route::get('admin/userd', [AdminReportController::class, 'articleget'])->name('report.user');

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v002 0714 신유진 new
 ************************************************/

Route::get('admin/main', [AdminMainController::class, 'main'])->name('admin.main');

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : web.php
 * 이력         : v002 0714 박진영 new
 ************************************************/
Route::post('comment/create', [CommentController::class, 'create'])->name('comment.create');
