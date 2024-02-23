<?php

namespace Database\Seeders;

use App\Models\Restaurant_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RestaurantTypeSeeder::class,
            UserRestaurantTypeSeeder::class,
            OrderSeeder::class,
            CustomerSeeder::class,
            FoodSeeder::class,
        ]);
    }
}
