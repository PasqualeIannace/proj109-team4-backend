<?php

namespace Database\Seeders;

use App\Models\Restaurant_type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restypes = [
            [

                'user_id' => 1,
                'restaurant_type_id' => 4,
            ],
        ];

        foreach ($restypes as $restype) {
            $user = User::find($restype['user_id']);
            $RestaurantType = Restaurant_type::find($restype['restaurant_type_id']);
            $user->types()->attach(
                $RestaurantType->id,

            );
        }
    }
}
