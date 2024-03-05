<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;  //aggiungo il contr Auth

class FoodController extends Controller
{
    public function index()
    {
        $results = Food::all();
        // $data = [
        //     "success" => true,
        //     "payload" => $results
        // ];
        // return response()->json($data);
        //$results = Food::all()->toArray();
        $data = [
            "success" => true,
            "payload" => $results
        ];

        return response()->json($data);
    }

    public function getByUser($userId)
    {
        $foods = Food::where('user_id', $userId)->get();

        $data = [
            "success" => true,
            "payload" => $foods
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
