<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(CourseSedder::class);
        $this->call(ReservationSeeder::class);
        $this->call(LikeSeeder::class);
    }
}
