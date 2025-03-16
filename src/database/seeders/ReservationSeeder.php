<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = [
            [
                'user_id' => 22,
                'store_id' => 1,
                'reservation_date' => now()->format('Y-m-d'),
                'reservation_time' => '19:00:00',
                'number_of_people' => 2,
                'course_id' => 2,
            ],
            [
                'user_id' => 22,
                'store_id' => 2,
                'reservation_date' => now()->addDay()->format('Y-m-d'),
                'reservation_time' => '18:00:00',
                'number_of_people' => 3,
                'course_id' => 4,
            ],
            [
                'user_id' => 22,
                'store_id' => 3,
                'reservation_date' => now()->subDay()->format('Y-m-d'),
                'reservation_time' => '12:00:00',
                'number_of_people' => 4,
                'course_id' => 5,
            ],
            [
                'user_id' => 23,
                'store_id' => 1,
                'reservation_date' => now()->format('Y-m-d'),
                'reservation_time' => '19:00:00',
                'number_of_people' => 2,
                'course_id' => 2,
            ],
            [
                'user_id' => 23,
                'store_id' => 1,
                'reservation_date' => now()->addDay()->format('Y-m-d'),
                'reservation_time' => '18:00:00',
                'number_of_people' => 3,
                'course_id' => 2,
            ],
            [
                'user_id' => 23,
                'store_id' => 1,
                'reservation_date' => now()->subDay()->format('Y-m-d'),
                'reservation_time' => '12:00:00',
                'number_of_people' => 4,
                'course_id' => 1,
            ],
            [
                'user_id' => 24,
                'store_id' => 1,
                'reservation_date' => now()->format('Y-m-d'),
                'reservation_time' => '19:00:00',
                'number_of_people' => 2,
                'course_id' => 2,
            ],
        ];
        foreach($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}
