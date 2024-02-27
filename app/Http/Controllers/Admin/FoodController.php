<?php

namespace App\Http\Controllers\Admin;  //ho aggiunto admin perche non leggeva il controller
use App\Http\Controllers\Controller; // Controller di base da importare
use Illuminate\Support\Facades\Auth;  //aggiungo il contr Auth
use App\Models\Food;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
                'description' => 'required|max:500',
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
            return view("admin.foods.index", compact("foods"));
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

        $tags = Tag::all();

        return view("admin.foods.create", compact("food", "userId", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validation($request->all());
        $validatedData['user_id'] = Auth::id();

        $imagePath = Storage::disk('public')->put('/images', $request['image']);
        $validatedData['image'] = $imagePath;

        $newFood = Food::create($validatedData);

        if ($request->tags) {
            $newFood->tags()->attach($request->tags);
        }

        return redirect()->route('admin.foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view("admin.foods.show", compact("food"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(String $id)
    {
        $editFood = Food::find($id);
        // dd($editFood->image); // Debugging statement
        $tags = Tag::all();
        return view('admin.foods.edit', compact('editFood', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $data = $request->all();
        $valid_data = $this->validation($data);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }

            // Store the new image
            $imagePath = Storage::disk('public')->put('/images', $request['image']);
            $valid_data['image'] = $imagePath;
        }

        $food->update($valid_data);

        if ($request->filled("tags")) {
            $data["tags"] = array_filter($data["tags"]) ? $data["tags"] : [];  //Livecoding con Luca
            $food->tags()->sync($data["tags"]);
        }

        return redirect()->route('admin.foods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route("admin.foods.index");
    }
}
