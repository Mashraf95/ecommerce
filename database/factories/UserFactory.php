<?php

namespace Database\Factories;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genderIDs = \App\Models\Gender::pluck('id')->toArray();
        $index = array_rand($genderIDs);

        $imageIDs = \App\Models\Image::pluck('id')->toArray();
        $index2 = array_rand($imageIDs);

        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' =>$this->faker->phoneNumber,
            'address' =>$this->faker->address,
            'is_admin' => $this->faker->boolean,
            'bio' => $this->faker->sentence,
            'gender_id' => $genderIDs[$index],
            'image_id' => $imageIDs[$index2],
            'password' => bcrypt('123456')
        ];
    }
}
