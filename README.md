# Rese（リーズ）
- 飲食店予約サービス
- トップ画面の画像
![alt](ReseTop.jpg)

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたいため。

## アプリケーションURL
- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/
- 一般ユーザーログイン：http://localhost/login
- 店舗代表者ログイン：http://localhost/owner/login
- 管理者ログイン：http://localhost/admin/login

※ログインの際は下記テストアカウントを使用してください。
## 機能一覧
- 会員登録
- ログイン
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除
- エリアで検索する
- ジャンルで検索する
- 店名で検索する

## 使用技術
- Laravel：8.83.29
- PHP：7.4.9
- mysql：8.0.26

## テーブル設計
![alt](table.jpg)

## ER図
![alt](er.png)

## 環境構築
1. Dockerを起動する
2. プロジェクト直下で、以下のコマンドを実行する
```
make init
```
## テストアカウント
name: 一般ユーザー1  
email: user1@gmail.com  
password: password  

name: 仙人店舗代表者  
email: owner1@gmail.com  
password: password  

name: 管理者  
email: admin@gmail.com  
password: password

## Stripeについて
.envファイルに以下のようにStripeのAPIキー設定をお願いします。
```
STRIPE_PUBLIC_KEY="パブリックキー"
STRIPE_SECRET_KEY="シークレットキー"
```
以下のリンクは公式ドキュメントです。<br>
https://docs.stripe.com/payments/checkout?locale=ja-JP
# restaurant-reservation-production
# restaurant-reservation-production
# restaurant-reservation-production
