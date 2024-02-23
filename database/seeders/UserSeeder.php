<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config("user");
        foreach ($users as $user) {
            $new_user = new user();
            $new_user->email = $user["email"];
            $new_user->password = $user["password"];
            $new_user->activity_name = $user["activity_name"];
            $new_user->address = $user["address"];
            $new_user->VAT_number = $user["VAT_number"];
            $new_user->save();
        }

        if (!User::where("email", "hameked854@huizk.com")->first()) {
            $mainUser = new User();
            $mainUser->name = "Ryan";
            $mainUser->email = "hameked854@huizk.com";
            $mainUser->password = ("xuNvr@8MpK!9phtvi6&8nX");
            $mainUser->save();
        }
    }
}
