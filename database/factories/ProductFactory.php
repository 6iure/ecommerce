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

        // $image = $this->faker->image(
        //     dir: storage_path('app'),
        //     width: 250,
        //     height: 250,
        //     fullPath: false
        // );

        // $imageUrl = $this->faker->imageUrl(width: 620, height: 480);

        return [
            'name' => $this->faker->safeColorName(),
            'description' => $this->faker->safeColorName(),
            'price' => $this->faker->numerify(),
            'current_stock' => $this->faker->numerify(),
            'image_path' => $this->faker->filePath(),
            'image_mimetype' => $this->faker->mimeType(),
            'image_size' => $this->faker->numerify(),
        ];
    }
}
