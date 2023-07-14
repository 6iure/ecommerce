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
            // 'category_id' => $this->faker->numerify(),
            'name' => $this->faker->safeColorName(),
            'description' => $this->faker->safeColorName(),
            'price' => $this->faker->numerify(),
            'current_stock' => $this->faker->numerify()
        ];
    }
}
