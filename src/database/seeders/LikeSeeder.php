<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [
            [
                'user_id' => 22,
                'store_id' => 4,
            ],
            [
                'user_id' => 22,
                'store_id' => 5,
            ],
            [
                'user_id' => 22,
                'store_id' => 6,
            ],
        ];
        foreach($likes as $like) {
            Like::create($like);
        }
    }
}
