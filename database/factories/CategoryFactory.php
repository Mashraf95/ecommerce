<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageIDs = \App\Models\Image::pluck('id')->toArray();
        $index2 = array_rand($imageIDs);

        return [
            'name' => $this->faker->unique()->text(100),
            'description' => $this->faker->sentence(25),
            'image_id' => $imageIDs[$index2],
        ];
    }
}
