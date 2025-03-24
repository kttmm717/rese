<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(22,24),
            'store_id' => $this->faker->numberBetween(1,20),
            'rating' => $this->faker->numberBetween(1,5),
            'comment' => $this->faker->realText(120),
        ];
    }
}
