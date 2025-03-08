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
                'email' => 'store1@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '牛助店舗代表者',
                'email' => 'store2@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '戦慄店舗代表者',
                'email' => 'store3@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'ルーク店舗代表者',
                'email' => 'store4@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '志摩屋店舗代表者',
                'email' => 'store5@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '香店舗代表者',
                'email' => 'store6@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'JJ店舗代表者',
                'email' => 'store7@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'らーめん極み店舗代表者',
                'email' => 'store8@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '鳥雨店舗代表者',
                'email' => 'store9@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '築地色合店舗代表者',
                'email' => 'store10@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '晴海店舗代表者',
                'email' => 'store11@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '三子店舗代表者',
                'email' => 'store12@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '八戒店舗代表者',
                'email' => 'store13@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '福助店舗代表者',
                'email' => 'store14@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'ラー北店舗代表者',
                'email' => 'store15@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '翔店舗代表者',
                'email' => 'store16@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '経緯店舗代表者',
                'email' => 'store17@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '漆店舗代表者',
                'email' => 'store18@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => 'THE TOOL店舗代表者',
                'email' => 'store19@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
            [
                'name' => '木船店舗代表者',
                'email' => 'store20@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password')
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
