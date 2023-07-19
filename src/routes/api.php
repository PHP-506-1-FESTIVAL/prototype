<?php

use App\Http\Controllers\ApiUserController;
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