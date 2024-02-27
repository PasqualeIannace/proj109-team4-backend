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
            [
                'user_id' => 1,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 2,
                'restaurant_type_id' => 1,
            ],
            [
                'user_id' => 2,
                'restaurant_type_id' => 8,
            ],
            [
                'user_id' => 3,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 3,
                'restaurant_type_id' => 2,
            ],
            [
                'user_id' => 4,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 4,
                'restaurant_type_id' => 3,
            ],
            [
                'user_id' => 5,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 5,
                'restaurant_type_id' => 1,
            ],
            [
                'user_id' => 6,
                'restaurant_type_id' => 4,
            ],
            [
                'user_id' => 6,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 6,
                'restaurant_type_id' => 9,
            ],
            [
                'user_id' => 7,
                'restaurant_type_id' => 6,
            ],
            [
                'user_id' => 8,
                'restaurant_type_id' => 1,
            ],
            [
                'user_id' => 8,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 9,
                'restaurant_type_id' => 7,
            ],
            [
                'user_id' => 9,
                'restaurant_type_id' => 1,
            ],
            [
                'user_id' => 10,
                'restaurant_type_id' => 10,
            ],
            [
                'user_id' => 11,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 11,
                'restaurant_type_id' => 2,
            ],
            [
                'user_id' => 11,
                'restaurant_type_id' => 3,
            ],
            [
                'user_id' => 12,
                'restaurant_type_id' => 5,
            ],
            [
                'user_id' => 12,
                'restaurant_type_id' => 1,
            ],
            [
                'user_id' => 12,
                'restaurant_type_id' => 7,
            ],
            [
                'user_id' => 13,
                'restaurant_type_id' => 7,
            ],
            [
                'user_id' => 13,
                'restaurant_type_id' => 1,
            ],
            [
                'user_id' => 14,
                'restaurant_type_id' => 4,
            ],
            [
                'user_id' => 14,
                'restaurant_type_id' => 9,
            ],
            [
                'user_id' => 15,
                'restaurant_type_id' => 1,
            ],
            [
                'user_id' => 15,
                'restaurant_type_id' => 5,
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
