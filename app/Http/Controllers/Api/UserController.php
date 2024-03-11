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

        if ($request->filled('selectedTypes')) {
            $selectedTypes = $request->input('selectedTypes');

            $users->where(function ($query) use ($selectedTypes) {
                foreach ($selectedTypes as $type) {
                    $query->whereHas('types', function ($q) use ($type) {
                        $q->where('id', $type);
                    });
                }
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

    public function show($id)
    {
        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Return the user details
            return response()->json([
                'success' => true,
                'payload' => $user,
                'logo_activity' => $user->logo_activity,
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception and return an error response
            return response()->json([
                'success' => false,
                'message' => 'Error fetching user: ' . $e->getMessage(),
            ], 500);
        }
    }
}
