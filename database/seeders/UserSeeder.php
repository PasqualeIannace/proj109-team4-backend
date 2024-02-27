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
            $new_user->logo_activity = "../../public/indian.png";
            $new_user->address = "Via Gandhi, 145, Milano (MI)";
            $new_user->VAT_number = "77634180036";
            $new_user->save();

            $new_user = new User();
            $new_user->name = "Pasquale Iannace";
            $new_user->email = "pasquale.iannace@hotmail.it";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Pasquale's Pizzeria";
            $new_user->logo_activity = "../../public/pizza.png";
            $new_user->address = "Via Roma, 1, Roma (RM)";
            $new_user->VAT_number = "12345678911";
            $new_user->save();

            $new_user = new User();
            $new_user->name = "Francesca Picoco";
            $new_user->email = "francesca.picoco96@gmail.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "MOYA";
            $new_user->logo_activity= "../../public/cinese.png";
            $new_user->address = "Via Bartolomeo, 11, Milano(MI)";
            $new_user->VAT_number = "12345675710";
            $new_user->save();

            $new_user = new User();
            $new_user->name = "Thomas Salvaterra";
            $new_user->email = "thomassalvaterra@gmail.it";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Kyiomi Sushi";
            $new_user->logo_activity = "../../public/japan.png";
            $new_user->address = "Corso Umberto, 14, Mantova (MN)";
            $new_user->VAT_number = "13245869024";
            $new_user->save();

            $new_user = new User();
            $new_user->name = "Abdullah Azza";
            $new_user->email = "abdullah.azza@gmail.it";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Ristorante La Lanterna";
            $new_user->logo_activity= "../../public/italian.png";
            $new_user->address = "Via Ugo Foscolo, 21, Modena (MO)";
            $new_user->VAT_number = "13245864248";
            $new_user->save();
            
          
            $new_user = new User();
            $new_user->name = "Miriam Ancona";
            $new_user->email = "miriam.ancona@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Thai Taste";
            $new_user->logo_activity= "../../public/thai.png";
            $new_user->address = "Via Garibaldi, 12, Milano (MI)";
            $new_user->VAT_number = "12345678901";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Alice Manelli";
            $new_user->email = "alice.manelli@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "The Golden Pint";
            $new_user->logo_activity= "../../public/pub.png";
            $new_user->address = "Piazza Navona, 8, Roma (RM)";
            $new_user->VAT_number = "23456789012";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Enea Bianchi";
            $new_user->email = "enea.bianchi@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "La Piazza";
            $new_user->logo_activity= "../../public/italian.png";
            $new_user->address = "Corso Italia, 15, Firenze (FI)";
            $new_user->VAT_number = "34567890123";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Antonio Ferrari";
            $new_user->email = "antonio.ferrari@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Agriturismo Bella Italia";
            $new_user->logo_activity= "../../public/italian.png";
            $new_user->address = "Via Roma, 10, Napoli (NA)";
            $new_user->VAT_number = "45678901234";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Luca Martini";
            $new_user->email = "luca.martini@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Caffè Centrale";
            $new_user->logo_activity= "../../public/bar.png";
            $new_user->address = "Viale Venezia, 20, Torino (TO)";
            $new_user->VAT_number = "56789012345";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Paolo Yamamoto";
            $new_user->email = "paolo.yamamoto@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Sakura Sushi";
            $new_user->logo_activity= "../../public/chinese_japanese.png";
            $new_user->address = "Via Giuseppe Garibaldi, 9, Bologna (BO)";
            $new_user->VAT_number = "67890123456";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Francesca De Luca";
            $new_user->email = "francesca.deluca@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Agriturismo del Sole";
            $new_user->logo_activity= "../../public/italian.png";
            $new_user->address = "Via Dante Alighieri, 7, Venezia (VE)";
            $new_user->VAT_number = "78901234567";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Giovanni Ricci";
            $new_user->email = "giovanni.ricci@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Vecchia Osteria";
            $new_user->logo_activity= "../../public/osteria.png";
            $new_user->address = "Piazza del Popolo, 3, Perugia (PG)";
            $new_user->VAT_number = "89012345678";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Sara Khan";
            $new_user->email = "sara.khan@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Thai Terrace";
            $new_user->logo_activity= "../../public/thai_indian.png";
            $new_user->address = "Via Roma, 5, Palermo (PA)";
            $new_user->VAT_number = "90123456789";
            $new_user->save();


            $new_user = new User();
            $new_user->name = "Marco Conti";
            $new_user->email = "marco.conti@example.com";
            $new_user->password = Hash::make('password');
            $new_user->activity_name = "Ristorante da Marco";
            $new_user->logo_activity= "../../public/italian.png";
            $new_user->address = "Corso Vittorio Emanuele, 30, Catania (CT)";
            $new_user->VAT_number = "01234567890";
            $new_user->save();
        }
    }
}
