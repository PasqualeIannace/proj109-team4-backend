<?php

namespace App\Http\Controllers\Admin;  //ho aggiunto admin perche non leggeva il controller
use App\Http\Controllers\Controller; // Controller di base da importare
use Illuminate\Support\Facades\Auth;  //aggiungo il contr Auth
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validation($data)
    {
        $validated = Validator::make(
            $data,
            [    //accetta 3 argomenti dato da validare, primo array con regole e secondo array con messaggi
                'image' => 'required',
                'name' => 'required|max:50',
                'ingredients' => 'required|max:200',
                'description' => 'required|max:200',
                'price' => 'required',
                'visible' => 'required',
            ],
            [
                'image' => 'Requisito Necessario',
                'name.required' => 'Requisito Necessario',
                'name.max' => 'Numero caratteri consentiti superato',
                'ingredients.required' => 'Requisito Necessario',
                'ingredients.max' => 'Numero caratteri consentiti superato',
                'description.required' => 'Requisito Necessario',
                'description.max' => 'Numero caratteri consentiti superato',
                'price.required' => 'Requisito Necessario',
                'visible.required' => 'Requisito Necessario',

            ]
        )->validate();
        return $validated;
    }

    public function index()
    { {
            //Recupera l'ID dell'utente autenticato
            $userId = Auth::id();
            //Recupera solo i Food collegati all'utente autenticato
            $foods = Food::where('user_id', $userId)->get();
            //$foods = Food::all();
            return view("admin.restaurants.index", compact("foods"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Food $food)
    {
        $userId = Auth::id();

        return view("admin.restaurants.create", compact("food", "userId"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $valid_data = $this->validation($data);
        $validated["user_id"] = Auth::id();
        $newFood = new Food();
        $newFood->fill($valid_data); 
        $newFood->save();

        return redirect()->route('admin.restaurants.index' , $newFood->id); //agg id per non ripetere l'agg dell'ogg      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Food $food)
    {
        $userId = Auth::id();
        return view("admin.events.edit", compact("food", "userId"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
