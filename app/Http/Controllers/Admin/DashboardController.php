<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Pagination\Paginator;
use App\CustomPaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;



class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $user = Auth::user();
        //Recupera solo i Food collegati all'utente autenticato
        $foods = Food::where('user_id', $userId)->get();
        //$foods = Food::where('user_id', $userId)->get();
        //$foods->withPath(route('admin.dashboard')); //personalizz
        //$customPaginator = new CustomPaginator(  //rendo food un'istanza della collect $foods=>query dentro index
        //    $foods->items(),
        //    $foods->total(),
        //    $foods->perPage(),
        //    $foods->currentPage(),
        //    [
        //        'path' => LengthAwarePaginator::resolveCurrentPath(),
        //    ]
        //);
           
        //  PROVA 1 //
     
         //per estrarre solo le etichette (alimenti) e i dati (Quantità degli alimenti), iterare su ciascun ordine estrarre le informazioni UTILI.

        //  $orders = Order::whereHas('foods', function ($query) use ($userId) {
        //     $query->where('user_id', $userId)->withTrashed();
        // })->with(['foods' => function ($query) use ($userId) {
        //     $query->where('user_id', $userId)->withTrashed()->withPivot('quantity');
        // }])->get();
        
        // $labels = [];
        // $data = [];
        
        // foreach ($orders as $order) {
        //     foreach ($order->foods as $food) {
        //         $labels[] = $food->name; // Presumibilmente il nome dell'alimento è l'etichetta
        //         $data[] = $food->pivot->quantity; // Quantità di ciascun alimento
        //     }
        // }

        $orders = Order::whereHas('foods', function ($query) use ($userId) {
            $query->where('user_id', $userId)->withTrashed();
        })->with(['foods' => function ($query) use ($userId) {
            $query->where('user_id', $userId)->withTrashed()->withPivot('quantity');
        }])->get();
        $groupedData = [];
        
        // Raggrupp0 i piatti per nome e conta il numero di ordini per ciascun piatto
        foreach ($orders as $order) {  
            foreach ($order->foods as $food) {
                $name = $food->name;
                $quantity = $food->pivot->quantity;
        
                if (!isset($groupedData[$name])) {   //vedo se esiste già una chiave nell'array associativo $groupedData con il nome specificato
                    $groupedData[$name] = 0;    // Se non esiste nell'array $groupedData, viene inizializzata a 0. per assicura che ci sia una chiave per ogni nome
                }
        
                $groupedData[$name] += $quantity;  //Incrementa il valore $name aggiungendo la quantità
            }
        }
        
        // Estrai le etichette e i dati raggruppati per il grafico
        $labels = array_keys($groupedData);
        $data = array_values($groupedData);
        
        return view('admin.dashboard', compact('labels', 'data','foods', 'userId', 'user','orders'));
    }
}
