<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = config("customer");

        foreach ($customers as $customer) {
            $new_customer = new Customer();

            $new_customer->fill($customer);
            $new_customer->save();
        }
    }
}
