<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;

//preno tutti gli ordini con il mio id
class OrderController extends Controller
{
    // public function index()
    // {
    //     $userId = Auth::id();
    //     $order = Order::where('user_id', $userId)->orderBy('id')->get();
    //     return view("admin.foods.order", compact("order" , "userId"));
    // }

    public function index(Order $order)
    {
        $userId = Auth::id();


        $orders = Order::whereHas('foods', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->withTrashed(); // Include soft-deleted foods
        })->with(['foods' => function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->withTrashed() // Include soft-deleted foods
                ->withPivot('quantity');
        }])->get();

        return view("admin.orders.index", compact("orders"));
    }

    public function show(Order $order)
    {
        // $userId = Auth::id();


        // $orders = Order::whereHas('foods', function ($query) use ($userId) {
        //     $query->where('user_id', $userId)
        //         ->withTrashed(); // Include soft-deleted foods
        // })->with(['foods' => function ($query) use ($userId) {
        //     $query->where('user_id', $userId)
        //         ->withTrashed() // Include soft-deleted foods
        //         ->withPivot('quantity');
        // }])->get();


        $userId = Auth::id();

        // Recupera l'ordine solo se appartiene all'utente autenticato (il tuo ristorante)
        $order = Order::where('id', $order->id)
                      ->whereHas('foods', function ($query) use ($userId) {
                          $query->where('user_id', $userId)
                                ->withTrashed(); // Include soft-deleted foods
                      })->with(['foods' => function ($query) use ($userId) {
                          $query->where('user_id', $userId)
                                ->withTrashed() // Include soft-deleted foods
                                ->withPivot('quantity');
                      }])->first();
    
        return view("admin.orders.show", compact("order"));
    }
}
