<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config("order");
        foreach ($orders as $singleOrder) {
            $neworder = new Order();
            $neworder->message = $singleOrder['message'];
            $neworder->payment_status = $singleOrder['payment_status'];
            $neworder->order_date = $singleOrder['order_date'];
            $neworder->total_price = $singleOrder['total_price'];
            $neworder->name_surname = $singleOrder['name_surname'];
            $neworder->address = $singleOrder['address'];
            $neworder->phone_number = $singleOrder['phone_number'];
            $neworder->email = $singleOrder['email'];
            $neworder->fill($singleOrder);
            $neworder->save();
        }
    }
}
