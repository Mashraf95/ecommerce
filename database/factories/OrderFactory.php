<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIDs = User::pluck('id')->toArray();
        $index = array_rand($userIDs);

        return [
            'user_id' => $userIDs[$index],
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'address' =>$this->faker->address,
            'discount' =>$this->faker->randomFloat(2, 0,100),
            'tax' =>$this->faker->randomFloat(2, 0,1000),
            'is_received' =>$this->faker->boolean(),
            'is_checked_out' =>true,
            'shipped_at' =>$this->faker->date()

        ];
    }
}
