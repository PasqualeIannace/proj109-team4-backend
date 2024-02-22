<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                'image' => '',
                'name' => 'Spaghetti alla carbonara',
                'ingredients' => 'Spaghetti, Tuorli, Guanciale, Pecorino romano, Pepe Nero',
                'description' => "Dove sono nati gli spaghetti alla carbonara? Il Vicolo della Scrofa, per chi conosce Roma, è una delle stradine più caratteristiche e ricche di simboli. Proprio in una trattoria di questa strada, da cui il nome del vicolo, pare sia stata realizzata la prima carbonara, nel 1944. La storia più attendibile su questo primo piatto, infatti, racconta l'incontro tra gli ingredienti a disposizione dei soldati americani e la fantasia di un cuoco romano.",
                'price' => '11€',
                'visible' => true,
                // 'user_id' => 1,

            ],
            [
                'image' => '',
                'name' => 'Spaghetti cacio e pepe',
                'ingredients' => 'Spaghetti, Pepe nero, Pecorino romano',
                'description' => "Gli spaghetti cacio e pepe sono diventati oramai piatti simbolo dell'italianità, realizzati con ingredienti DOP legati alle tradizioni dei territori in cui sono nate.",
                'price' => '8€',
                'visible' => true,
                // 'user_id' => 1,

            ],
            [
                'image' => '',
                'name' => 'Involtini primavera',
                'ingredients' => 'Sfoglie per involtini, Carote, Vino di riso, Cavolo cappuccio, Cipolle bianche, Olio di semi di arachide, Sale fino, Pepe bianco',
                'description' => "In passato venivano preparati soprattutto in occasione del Capodanno cinese, che secondo il calendario tradizionale corrisponde con l’inizio della primavera… ed ecco spiegato il loro nome: involtini primavera!",
                'price' => '9€',
                'visible' => true,
                // 'user_id' => 2,

            ],
            [
                'image' => '',
                'name' => 'Ravioli al vapore',
                'ingredients' => 'Maiale macinato, Cavolo cappuccio, Cipollotto fresco, Vino di riso, Salsa di soia, Sale fino, Pepe bianco',
                'description' => "Sono tipici del Capodanno cinese, come gli involtini primavera, ma vengono consumati durante tutte le festività perché la loro forma, che ricorda quella di un’antica moneta, è considerata un simbolo di buona fortuna: stiamo parlando dei ravioli cinesi al vapore!",
                'price' => '11€',
                'visible' => true,
                // 'user_id' => 2,

            ],
            [
                'image' => '',
                'name' => 'Futomaki',
                'ingredients' => 'Riso per sushi cotto, Wasabi, Alga nori, Surimi, Uova di lompo, Cetrioli, Tonno, Avocado, Salsa di soia, Zenzero sotto aceto',
                'description' => "Il futomaki è un sushi arrotolato, fatto con una foglia intera di alga nori ripiena di riso e almeno 4 ingredienti a scelta. Questa varietà di ingredienti, rende il futomaki molto colorato ed è tra i pezzi di sushi più apprezzati.",
                'price' => '6€',
                'visible' => true,
                // 'user_id' => 3,

            ],
            [
                'image' => '',
                'name' => 'Tempura',
                'ingredients' => 'Gamberi, Carote, Zucchine, Farina di riso, Olio di semi di girasole',
                'description' => "La tempura è uno dei piatti più conosciuti e amati della cucina del Sol Levante, nonché uno dei più richiesti nei ristoranti in giro per il mondo.",
                'price' => '8€',
                'visible' => true,
                // 'user_id' => 3,

            ],
            [
                'image' => '',
                'name' => 'Masala Dosa',
                'ingredients' => 'Patate, Semi di senape, Lenticchie, Assafetida, Foglie di curry, Zenzero, Cipolla, Foglie di coriandolo, Peperoncini verdi',
                'description' => "La tempura è uno dei piatti più conosciuti e amati della cucina del Sol Levante, nonché uno dei più richiesti nei ristoranti in giro per il mondo.",
                'price' => '11€',
                'visible' => true,
                // 'user_id' => 4,

            ],
            [
                'image' => '',
                'name' => 'Bhelpuri',
                'ingredients' => 'Riso soffiato, Arachidi, Ceci tostati, Cetriolo, Patate, Cipolla, Pomodoro, Chaat Masala, Curcuma',
                'description' => "Il Bhelpuri è uno snack salato, tipico della cucina indiana a base di riso soffiato, che può essere consumato col cucchiaio o raccolto su una piadina.",
                'price' => '6€',
                'visible' => true,
                // 'user_id' => 4,

            ]


        ];
        foreach ($foods as $food) {

            $new_food = new Food();
            $new_food->image = $food['image'];
            $new_food->name = $food['name'];
            $new_food->ingredients = $food['ingredients'];
            $new_food->description =  $food['description'];
            $new_food->price =  $food['price'];
            $new_food->visible =  $food['visible'];
            // $new_food->user_id = $food['user_id'];

            $new_food->save();
        }
    }
}
