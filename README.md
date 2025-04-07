# Rese（リーズ）
- 飲食店予約サービス管理アプリ
- トップ画面の画像
![alt](ReseTop.jpg)

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたいため。

## アプリケーションURL
- トップ画面：http://localhost
- 新規登録画面：http://localhost/register
- 一般ユーザーログイン：http://localhost/login
- 店舗代表者ログイン：http://localhost/owner/login
- 管理者ログイン：http://localhost/admin/login
- phpMyAdmin：http://localhost:8080

※ログインの際は下記テストアカウントを使用してください。

## テストアカウント
- name: 一般ユーザー1  
  - email: user1@gmail.com  
  - password: password  

- name: 仙人店舗代表者  
  - email: owner1@gmail.com  
  - password: password  

- name: 管理者  
  - email: admin@gmail.com  
  - password: password

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

## セットアップ手順（開発環境）
Dockerビルド  
1.git clone git@github.com:kttmm717/restaurant-reservation-production.git  
2.docker-compose up -d --build  

Lavaral環境構築  
1.docker-compose exec php bash  
2.composer install  
3.cp .env.example .env  
4..envファイルの変更  
```
　DB_HOSTをmysqlに変更  
　DB_DATABASEをlaravel_dbに変更  
　DB_USERNAMEをlaravel_userに変更  
　DB_PASSをlaravel_passに変更  
　MAIL_FROM_ADDRESSに送信元アドレスを設定  
```
5.php artisan key:generate  
6.php artisan migrate  
7.php artisan db:seed  

## メール認証
mailtrapというツールを使用しています。<br>
以下のリンクから会員登録をしてください。　<br>
https://mailtrap.io/

メールボックスのIntegrationsから 「laravel 7.x and 8.x」を選択し、　<br>
.envファイルのMAIL_MAILERからMAIL_ENCRYPTIONまでの項目をコピー＆ペーストしてください。　<br>
MAIL_FROM_ADDRESSは任意のメールアドレスを入力してください。

## その他
- 各ページの左上の青文字RESEのロゴをクリックすると、各ページに飛べるHOME画面に遷移します。
- 評価機能について、予約日の翌日以降から、利用者が店舗を５段階評価とコメントのレビューができるようになります。
- 予約削除機能について、マイページの各予約（青背景）の右上バツをクリックすると予約削除ができます。