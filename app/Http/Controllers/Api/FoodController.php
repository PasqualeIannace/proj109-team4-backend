<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        $results = Food::all();
        $data = [
            "success" => true,
            "payload" => $results
        ];
        return response()->json($data);
    }

    // Metodo show che usa il success true/false
    //public function show($id)
    // {
    //     $event = Food::with("user")->find($id);

    //     return response()->json([
    //         "success" => $event ? true : false,
    //         "payload" => $event ? $event : "Nessun evento corrispondente all'id"
    //     ]);
    //}

}
