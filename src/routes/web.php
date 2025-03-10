<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;

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

Route::get('/', [StoreController::class, 'index']);
Route::get('/detail/{store_id}', [StoreController::class, 'detail']);
Route::get('/home', [HomeController::class, 'home']);

Route::middleware('auth')->group(function() {
    Route::get('/thanks', [ThanksController::class, 'thanks']); //会員登録感謝
    Route::post('/done', [StoreController::class, 'reservation']); //予約作成
    Route::post('/like/{store_id}', [LikeController::class, 'create']); //お気に入り登録
    Route::post('/unlike/{store_id}', [LikeController::class, 'delete']); //お気に入り削除
    Route::get('/mypage', [MypageController::class, 'mypage']); //マイページ表示
});