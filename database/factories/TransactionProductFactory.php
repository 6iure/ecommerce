<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numerify(),
            'price' => $this->faker->numerify(),
            'total' => $this->faker->numerify()
        ];
    }
}
