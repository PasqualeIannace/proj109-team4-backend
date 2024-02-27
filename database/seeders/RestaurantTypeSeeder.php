<?php

namespace Database\Seeders;

use App\Models\Restaurant_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [

                'name' => 'Italiano',
            ],
            [
                'name' => 'Cinese',
            ],
            [
                'name' => 'Giapponese',
            ],
            [
                'name' => 'Indiano',
            ],
            [
                'name' => 'Ristorante',
            ],
            [
                'name' => 'Pub',
            ],
            [
                'name' => 'Agriturismo',
            ],
            [
                'name' => 'Pizzeria',
            ],
            [
                'name' => 'Thailandese',
            ],
            [
                'name' => 'Cafe',
            ],

        ];

        foreach ($types as $type) {
            $newType = new Restaurant_type();
            $newType->fill($type);
            $newType->save();
        }
    }
}
