<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catIDs = \App\Models\Category::pluck('id')->toArray();
        $index = array_rand($catIDs);

        $imageIDs = \App\Models\Image::pluck('id')->toArray();
        $index2 = array_rand($imageIDs);
        return [
            'name' => $this->faker->unique()->text(100),
            'selling_price' =>$this->faker->randomFloat(2, 0, 999),
            'buying_price' =>$this->faker->randomFloat(2, 0, 999),
            'discount' =>$this->faker->randomFloat(2, 0, 100),
            'is_available' =>$this->faker->boolean(),
            'is_new' =>$this->faker->boolean(),
            'is_upcoming' =>$this->faker->boolean(),
            'category_id' => $catIDs[$index],
            'image_id' => $imageIDs[$index2],
            'amount' =>$this->faker->randomNumber(3),
            'description' =>$this->faker->sentence(30)

        ];
    }
}
