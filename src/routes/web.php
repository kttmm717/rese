<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
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

Route::get('/owner/login', [AuthController::class, 'ownerLoginView']); //店舗代表者ログイン画面表示
Route::post('/owner/login', [AuthController::class, 'ownerLogin']); //店舗代表者ログイン
Route::get('/admin/login', [AuthController::class, 'adminLoginView']); //管理者ログイン画面表示
Route::post('/admin/login', [AuthController::class, 'adminLogin']); //管理者ログイン

Route::middleware('owner')->group(function() {
    Route::get('/owner/home', [HomeController::class, 'ownerHome']); //店舗代表者ホーム
    Route::get('/reservation', [OwnerController::class, 'index']); //自店予約情報確認画面表示
    Route::get('/reservation/search', [OwnerController::class, 'search']); //予約日検索
    Route::get('/store/create', [OwnerController::class, 'storeCreateView']); //店舗作成画面表示
    Route::post('/store/create', [OwnerController::class, 'storeCreate']); //店舗作成
    Route::get('/store/update', [OwnerController::class, 'storeUpdateView']); //店舗更新画面表示
    Route::post('/store/update', [OwnerController::class, 'storeUpdate']); //店舗更新
    Route::get('/owner/notify', [EmailController::class, 'sendEmailView']);
    Route::post('/owner/notify', [EmailController::class, 'sendEmail']);
});
Route::middleware('admin')->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome']); //管理者ホーム
    Route::get('/admin', [AdminController::class, 'index']); //店舗代表者を作成画面表示
    Route::post('/admin/register', [AdminController::class, 'ownerCreate']); //店舗代表者作成
});


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

Route::middleware('auth', 'verified')->group(function() {
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
    Route::get('/qr/{reservation_id}', [MypageController::class, 'qrView']);
});