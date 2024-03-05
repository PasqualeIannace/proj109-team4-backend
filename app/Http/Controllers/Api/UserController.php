<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        // Carica i dati della relazione 'types' (restaurant_types)
        $users->with('types');

        // Applica il filtro se sono stati passati parametri
        if ($request->filled('selectedTypes')) {
            $selectedTypes = $request->input('selectedTypes');
            $users->whereHas('types', function ($query) use ($selectedTypes) {
                $query->whereIn('id', $selectedTypes);
            });
        }

        // Ottieni gli utenti filtrati con i dati della relazione 'types'
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
