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
            $new_user->name = "Israr Muhammad";
            $new_user->email = "israr.muhammad@libero.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Taj Mahal Restaurant";
            $new_user->address = "Via Gandhi, 145, Milano (MI)";
            $new_user->VAT_number = "77634180036";
            $new_user->save();

            $new_user = new User();
            $new_user->name = "Pasquale Iannace";
            $new_user->email = "pasquale.iannace@hotmail.it";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Pasquale's Pizzeria";
            $new_user->address = "Via Roma, 1, Roma (RM)";
            $new_user->VAT_number = "12345678911";
            $new_user->save();

            $new_user = new User();
            $new_user->name = "Francesca Picoco";
            $new_user->email = "francesca.picoco96@gmail.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "MOYA";
            $new_user->address = "Via Bartolomeo, 11, Milano(MI)";
            $new_user->VAT_number = "12345675710";
            $new_user->save();

            $new_user = new User();
            $new_user->name = "Thomas Salvaterra";
            $new_user->email = "thomassalvaterra@gmail.it";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Kyiomi Sushi";
            $new_user->address = "Corso Umberto, 14, Mantova (MN)";
            $new_user->VAT_number = "13245869024";
            $new_user->save();
        }
    }
}
