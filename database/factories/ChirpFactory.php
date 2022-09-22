<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChirpFactory extends Factory
{
    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
        ];
    }
}
