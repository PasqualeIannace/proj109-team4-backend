<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant_type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Restaurant_type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'activity_name' => ['required', 'string', 'max:500'],
            'logo_activity' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048', 'required'],
            'address' => ['required', 'string', 'max:500'],
            'VAT_number' => ['required', 'string', 'max:11', 'unique:' . User::class],
            'types' => ['required', 'array'],


        ]);
        $uploadedFile = $request->file('logo_activity');
        $imageName = uniqid('', true) . '.' . $uploadedFile->getClientOriginalExtension();


        $uploadedFile->storeAs('images', $imageName, 'public');

        $imageUrl = url('storage/images/' . $imageName);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'activity_name' => $request->activity_name,
            'logo_activity' => $imageUrl,
            'address' => $request->address,
            'VAT_number' => $request->VAT_number,
            /* 'restaurant_type' => $request->input('types'),
 */

        ]);

        /*  $types = Restaurant_type::all(); */

        $user->types()->sync($request->input('types'));


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        /*         return view('auth.register', compact('types')); */
    }
}
