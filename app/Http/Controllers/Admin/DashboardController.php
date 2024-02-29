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
         
        $orders = Order::whereHas('foods', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->withTrashed(); // Include soft-deleted foods
        })->with(['foods' => function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->withTrashed() // Include soft-deleted foods
                ->withPivot('quantity');
        }])->first();

        return view('admin.dashboard', compact('foods', 'userId', "user" , "orders"));
    }
}
