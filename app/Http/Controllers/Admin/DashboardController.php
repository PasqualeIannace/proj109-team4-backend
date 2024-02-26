<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
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
        $foods = Food::where('user_id', $userId)->paginate(5);

        return view('admin.dashboard', compact('foods', 'userId', "user"));
    }
}
