<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = config("user");
        // foreach ($users as $user) {
        //     $new_user = new User();
        //     $new_user->email = $user["email"];
        //     $new_user->password = Hash::make('password');
        //     $new_user->activity_name = $user["activity_name"];
        //     $new_user->address = $user["address"];
        //     $new_user->VAT_number = $user["VAT_number"];
        //     $new_user->save();
        // }

        if (!User::where("email", "luca.lambia@gmail.com")->first()) {
            $new_user = new User();
            $new_user->email = "hameked854@huizk.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "King's Outlaw Tavern";
            $new_user->address = "9869 Ryan Plaza Apt. 293";
            $new_user->VAT_number = "77634180036";
            $new_user->save();
        }
    }
}
