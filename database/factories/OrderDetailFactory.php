<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $orderIDS= Order::pluck('id')->toArray();
        $productIDs = Product::pluck('id')->toArray();
        $index = array_rand($orderIDS);
        $index2 = array_rand($productIDs);

        return [
            'order_id' => $orderIDS[$index],
            'product_id' => $productIDs[$index2],
            'amount' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(2,20,100),
            'discount' => $this->faker->randomFloat(2,0,1000)
        ];
    }
}
