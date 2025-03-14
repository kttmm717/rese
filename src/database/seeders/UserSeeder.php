<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => '仙人店舗代表者',
                'email' => 'owner1@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '牛助店舗代表者',
                'email' => 'owner2@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '戦慄店舗代表者',
                'email' => 'owner3@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => 'ルーク店舗代表者',
                'email' => 'owner4@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '志摩屋店舗代表者',
                'email' => 'owner5@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '香店舗代表者',
                'email' => 'owner6@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => 'JJ店舗代表者',
                'email' => 'owner7@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => 'らーめん極み店舗代表者',
                'email' => 'owner8@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '鳥雨店舗代表者',
                'email' => 'owner9@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '築地色合店舗代表者',
                'email' => 'owner10@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '晴海店舗代表者',
                'email' => 'owner11@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '三子店舗代表者',
                'email' => 'owner12@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '八戒店舗代表者',
                'email' => 'owner13@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '福助店舗代表者',
                'email' => 'owner14@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => 'ラー北店舗代表者',
                'email' => 'owner15@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '翔店舗代表者',
                'email' => 'owner16@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '経緯店舗代表者',
                'email' => 'owner17@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '漆店舗代表者',
                'email' => 'owner18@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => 'THE TOOL店舗代表者',
                'email' => 'owner19@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '木船店舗代表者',
                'email' => 'owner20@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'owner',
            ],
            [
                'name' => '管理者',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => '一般ユーザー1',
                'email' => 'user1@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
            [
                'name' => '一般ユーザー2',
                'email' => 'user2@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
            [
                'name' => '一般ユーザー3',
                'email' => 'user3@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
