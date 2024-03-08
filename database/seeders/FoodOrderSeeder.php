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
        $food_order = config("food_orders");

        foreach ($food_order as $single_order) {
            $food = Food::find($single_order['food_id']);
            $order = Order::find($single_order['order_id']);

            // Inserimento dei dati pivot
            $food->orders()->attach($order->id, ['quantity' => $single_order['quantity']]); //specificare l'ID dell'ordine che stai collegando al cibo e anche il valore della quantità associata a quell'ordine per quel particolare cibo.
            //collega l'ordine specificato ($order->id) al cibo corrente ($food), e associare la quantità specificata ($single_order['quantity']) con quel collegamento nella tabella pivot
        }
    }
}
