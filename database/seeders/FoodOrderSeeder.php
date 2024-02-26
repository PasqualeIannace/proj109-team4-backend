<?php

namespace Database\Seeders;
use App\Models\Food;
use App\Models\Order;
use App\Models\FoodOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$food = Food::find(1);
        //$order = Order::find(1);
        $food_order = config("food_order");

        foreach ($food_order as $single_order) {
            $food = Food::find($single_order['food_id']);
            $order = Order::find($single_order['order_id']);           // Inserimento dei dati pivot
            $food->orders()->attach($order->id, [
                'quantity' => $single_order['quantity'],
                'id' => $single_order['id']
            ]);
    }
    }
}
