<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Requests\EmailVerificationRequest;


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

//メール認証
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->name('verification.notice');

Route::post('/email/verify', function() {
    session()->get('unauthenticated_user')->sendEmailVerificationNotification();
    return back()->with('message', '認証メールを再送しました');
});
Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request) {
    $request->fulfill();
    session()->forget('unauthenticated_user');
    return redirect('/thanks');
})->name('verification.verify');


Route::get('/', [StoreController::class, 'index']); //店舗一覧
Route::get('/detail/{store_id}', [StoreController::class, 'detail']); //店舗詳細
Route::get('/home', [HomeController::class, 'home']); //ホーム
Route::get('/search', [StoreController::class, 'search']); //検索

Route::middleware('auth')->group(function() {
    Route::get('/thanks', [ThanksController::class, 'thanks']); //会員登録感謝
    Route::post('/done', [StoreController::class, 'reservation']); //予約作成
    Route::get('change/{reservation_id}', [MypageController::class, 'changeView']); //予約変更
    Route::post('change/{reservation_id}', [MypageController::class, 'reservationChange']); //予約変更完了
    Route::post('/like/{store_id}', [LikeController::class, 'create']); //お気に入り登録
    Route::post('/unlike/{store_id}', [LikeController::class, 'delete']); //お気に入り削除
    Route::get('/mypage', [MypageController::class, 'mypage']); //マイページ表示
    Route::delete('/delete/{reservation_id}', [MypageController::class, 'delete']); //予約削除
    Route::delete('review/delete/{reservation_id}', [MypageController::class, 'reviewDelete']); //レビュー欄削除
    Route::get('/review/{reservation_id}', [ReviewController::class, 'review']); //レビュー画面表示
    Route::post('/review/create/{store_id}', [ReviewController::class, 'reviewCreate']); //レビュー作成
});