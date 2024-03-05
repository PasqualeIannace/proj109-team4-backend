<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
       // $users = User::all();
        //Recupera l'ID dell'utente autenticato
        // $userId = Auth::id();
        // //Recupera solo i Food collegati all'utente autenticato
        // $foods = Food::where('user_id', $userId)
        //     //->where('visible', true)
        //     ->get();
        // $data = [
        //     "success" => true,
        //     "payload" => $users
        // ];
        // return response()->json($data);
        // $restaurantTypes = Restaurant_type::with('users')->get();
        // $data = [
        //     "success" => true,
        //     "payload" => $restaurantTypes
        // ];

        // Recupera tutti gli utenti
    

    // Applica il filtro se sono stati passati parametri
    if ($request->filled('selectedTypes')) {
        $selectedTypes = $request->input('selectedTypes');
        $users->whereHas('types', function ($query) use ($selectedTypes) {
            $query->whereIn('id', $selectedTypes);
        });
    } else {
        $users = User::query();
    }

    // Ottieni gli utenti filtrati
    $filteredUsers = $users->get();

    $data = [
        "success" => true,
        "payload" => $filteredUsers
    ];

        return response()->json($data);
    }

    //Metodo show che usa il success true/false
    // public function show($id)
    // {
    //     $event = Food::with("user")->find($id);

    //     return response()->json([
    //         "success" => $event ? true : false,
    //         "payload" => $event ? $event : "Nessun evento corrispondente all'id"
    //     ]);
    // }
}
