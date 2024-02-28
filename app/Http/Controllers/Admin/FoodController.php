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
            [
                'name' => 'required|max:50',
                'ingredients' => 'required|max:200',
                'description' => 'required|max:200',
                'price' => 'required',
                'visible' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|required_without:image_url',
                'image_url' => 'nullable|url|max:255|required_without:image',
            ],
            [
                'name.required' => 'Requisito Necessario',
                'name.max' => 'Numero caratteri consentiti superato',
                'ingredients.required' => 'Requisito Necessario',
                'ingredients.max' => 'Numero caratteri consentiti superato',
                'description.required' => 'Requisito Necessario',
                'description.max' => 'Numero caratteri consentiti superato',
                'price.required' => 'Requisito Necessario',
                'visible.required' => 'Requisito Necessario',
                'image.required_without:image_url' => 'Select an image file to upload or provide an Image URL.',
                'image_url.required_without:image' => 'Provide an Image URL or select an image file to upload.',
                'image_url.url' => 'The Image URL must be a valid URL.',
            ]
        );

        // Check if the provided image URL is absolute, if not, make it absolute
        if ($data['image_url'] && !filter_var($data['image_url'], FILTER_VALIDATE_URL)) {
            $data['image_url'] = url($data['image_url']);
        }

        $validated->validate();

        return $validated->validated();
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

        // Check if the image is uploaded from a URL
        if ($request->filled('image_url')) {
            // Download and save the image locally
            $downloadedImagePath = $this->downloadImage($request->input('image_url'));

            // Save the downloaded image path to the database
            $validatedData['image'] = $downloadedImagePath;
        } else {
            // Handle image upload from local storage
            $imagePath = Storage::disk('public')->put('/images', $request->file('image'));
            $validatedData['image'] = $imagePath;
        }

        $newFood = Food::create($validatedData);

        if ($request->tags) {
            $newFood->tags()->attach($request->tags);
        }

        return redirect()->route('admin.foods.index');
    }

    // Add this method to handle image download
    private function downloadImage($imageUrl)
    {
        $extension = pathinfo($imageUrl, PATHINFO_EXTENSION);
        $fileName = 'downloaded_image_' . time() . '.' . $extension;
        $path = storage_path('app/public/images/') . $fileName;

        // Download and save the image locally
        $imageContent = file_get_contents($imageUrl);
        file_put_contents($path, $imageContent);

        return 'images/' . $fileName;
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
            // Handle file upload
            $imagePath = Storage::disk('public')->put('/images', $request->file('image'));
            $valid_data['image'] = $imagePath;

            // If there was a previous image, delete it
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }
        } elseif ($request->filled('image_url')) {
            // If image URL is provided, use it directly
            $valid_data['image'] = $request->image_url;

            // If there was a previous image, delete it
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }
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
