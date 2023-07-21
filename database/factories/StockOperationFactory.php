<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockOperationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'operation_id' => random_int(1,2),
            'amount' => $this->faker->numerify(),
        ];
    }
}
