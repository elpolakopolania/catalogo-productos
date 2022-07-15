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
            'name' => $this->faker->name(),
            'size' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'observation' => $this->faker->text(),
            'trademarks_id' => rand(1, 20),
            'inventory_quantity' => rand(0, 1000),
            'boarding_date' => $this->faker->date()
        ];
    }
}
