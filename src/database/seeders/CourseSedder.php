<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'store_id' => 1,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 1,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 2,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 2,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 3,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 3,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 4,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 4,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 5,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 5,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 6,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 6,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 7,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 7,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 8,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 8,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 9,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 9,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 10,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 10,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 11,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 11,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 12,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 12,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 13,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 13,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 14,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 14,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 15,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 15,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 16,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 16,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 17,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 17,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 18,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 18,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 19,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 19,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
            [
                'store_id' => 20,
                'name' => 'ランチコース',
                'price' => 2000,
            ],
            [
                'store_id' => 20,
                'name' => 'ディナーコース',
                'price' => 4000,
            ],
        ];

        foreach($courses as $course) {
            Course::create($course);
        }
    }
}
