<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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

    public function index()
    {
        //$userId = Auth::id();
        $orders = Order::all();

        // $orders = Order::whereHas('food', function ($query) use ($userId) {
        //     $query->where('user_id', $userId);
        // })->orderBy('id')->get();

        return view("admin.foods.orders.index", compact("orders"));
    }
    
}
