<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();
        DB::table('genders')->delete();
        DB::table('users')->delete();
        DB::table('categories')->delete();
        DB::table('products')->delete();
        DB::table('orders')->delete();
        DB::table('order_details')->delete();


        \App\Models\Image::factory(100)->create();
        \App\Models\Gender::factory(5)->create();
        \App\Models\User::factory(100)->create();
        \App\Models\Category::factory(25)->create();
        \App\Models\Product::factory(1000)->create();
        \App\Models\Order::factory(100)->create();
        \App\Models\OrderDetail::factory(1000)->create();

    }
}
