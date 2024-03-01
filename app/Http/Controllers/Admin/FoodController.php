<?php

namespace App\Http\Controllers\Admin;  //ho aggiunto admin perche non leggeva il controller
use App\Http\Controllers\Controller; // Controller di base da importare
use Illuminate\Support\Facades\Auth;  //aggiungo il contr Auth
use App\Models\Food;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function validation($data, $editMode = false)
    {
        $imageValidation = $editMode ? 'nullable' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|required';

        $validated = Validator::make(
            $data,
            [
                'name' => 'required|max:50',
                'ingredients' => 'required|max:200',
                'description' => 'max:500',
                'price' => 'required',
                'visible' => 'required',
                'image' => $imageValidation,
                /* 'image_url' => 'nullable|url|max:255|required_without:image', */
            ],
            [
                'name.required' => 'Requisito Necessario',
                'name.max' => 'Numero caratteri consentiti superato',
                'ingredients.required' => 'Requisito Necessario',
                'ingredients.max' => 'Numero caratteri consentiti superato',
                'description.max' => 'Numero caratteri consentiti superato',
                'price.required' => 'Requisito Necessario',
                'visible.required' => 'Requisito Necessario',
                'image.required_without' => 'Seleziona un File o un Url Image',
                'image_url.required_without' => 'Inserisci un Url Image o seleziona un File.',
                'image_url.url' => 'Url inserito non valido.',
            ]
        );

        // Check if the provided image URL is absolute, if not, make it absolute
        /*         if ($data['image_url'] && !filter_var($data['image_url'], FILTER_VALIDATE_URL)) {
            $data['image_url'] = url($data['image_url']);
        } */

        $validated->validate();

        return $validated->validated();
    }




    public function index()
    {
        $user = Auth::user();
        //Recupera l'ID dell'utente autenticato
        $userId = Auth::id();
        //Recupera solo i Food collegati all'utente autenticato

        $foods = Food::where('user_id', $userId)
            //->where('visible', true)
            ->get();
        return view("admin.foods.index", compact("foods", 'user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Food $food)
    {
        $userId = Auth::id();
        $user = Auth::user();

        $tags = Tag::all();

        return view("admin.foods.create", compact("food", "userId", "tags", 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Food $food)
    {
        $data = $request->all();
        $validatedData = $this->validation($request->all());
        $validatedData['user_id'] = Auth::id();

        // Check if the image is uploaded from a URL
        if ($request->filled('image_url')) {
            $validatedData['image'] = $request->input('image_url');
        } else {
            // Handle image upload from local storage
            $imagePath = Storage::disk('public')->put('/images', $request->file('image'));
            $validatedData['image'] = $imagePath;
        }

        $newFood = Food::create($validatedData);

        if ($request->filled("tags")) {
            $data["tags"] = array_filter($data["tags"]) ? $data["tags"] : [];
            $newFood->tags()->sync($data["tags"]);
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
        $user = Auth::user();
        return view("admin.foods.show", compact("food", 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(String $id)
    {
        $user = Auth::user();
        $editFood = Food::find($id);

        if (!$editFood) {
            return $this->redirectToIndexWithAlert('Food item not found.');
        }

        if (!$this->isUserAuthorizedForEdit($editFood)) {
            return $this->redirectToIndexWithAlert('You are not authorized to edit this food item.');
        }

        $tags = Tag::all();
        $editMode = true;

        return view('admin.foods.edit', compact('editFood', 'tags', 'user'))->with('input', $editFood->toArray())
            ->with('editMode', true);
    }

    private function isUserAuthorizedForEdit(Food $food)
    {
        return $food->user_id === auth()->id();
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
        $editMode = true;

        // Modify the validation logic
        $valid_data = $this->validation($data, $editMode);

        if (!$this->isUserAuthorizedForEdit($food)) {
            $this->redirectToIndexWithAlert('You are not authorized to edit this food item.');
        }

        if ($request->hasFile('image')) {
            // Handle file upload
            $imagePath = Storage::disk('public')->put('/images', $request->file('image'));

            // If there was a previous image, delete it
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }

            $valid_data['image'] = $imagePath;
        } elseif ($request->filled('image_url')) {
            // If image URL is provided, use it directly
            $valid_data['image'] = $request->image_url;
        } else {
            // If no new image is provided, retain the existing image
            $valid_data['image'] = $food->image;
        }

        $food->update($valid_data);

        if ($request->filled("tags")) {
            $data["tags"] = array_filter($data["tags"]) ? $data["tags"] : [];
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
