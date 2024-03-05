<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant_type;

class RestaurantTypeController extends Controller
{
    public function index()
    {
        $restaurantTypes = Restaurant_type::with('users')->get();
        $data = [
            "success" => true,
            "payload" => $restaurantTypes
        ];
        return response()->json($data);
        // ddd($restaurantTypes);
    }
}