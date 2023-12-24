<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(60),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10, 9000),
            'quantity' => $this->faker->numberBetween(1,100),
        ];
    }
}
