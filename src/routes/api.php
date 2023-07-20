<?php

use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\CommentApiController;
use App\Http\Controllers\MainApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('mainapi/{str_val}', [MainApiController::class, 'index'])->name('mainApi.index');
Route::get('mainapiall/', [MainApiController::class, 'all'])->name('mainapiall.all');

Route::get('emailchk', [ApiUserController::class, 'emailindex']);
Route::get('emailchk/{id}', [ApiUserController::class, 'emailshow']);

Route::get('nickchk', [ApiUserController::class, 'nickindex']);
Route::get('nickchk/{id}', [ApiUserController::class, 'nickshow']);

// 0719 이가원 add
Route::get('hit', [MainApiController::class, 'hit'])->name('hit');

/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : routes
 * 파일명       : api.php
 * 이력         : v002 20 김재성 new
 ************************************************/

//해당 보드 댓글 발송
Route::get('comments/{board_id}',[CommentApiController::class, 'boardComment'])->name('comments.index');
//댓글 작성
Route::post('comments/{board_id}',[CommentApiController::class, 'store'])->name('comments.store');
//댓글 수정
Route::put('comments/{comment_id}',[CommentApiController::class, 'update'])->name('comments.update');
//댓글 삭제
Route::delete('comments/{comment_id}',[CommentApiController::class, 'destroy'])->name('comments.destroy');
