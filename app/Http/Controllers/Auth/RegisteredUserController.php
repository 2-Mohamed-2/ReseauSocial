<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $mems = User::latest()->get();
        $grades = Grade::latest()->get();
        $roles = Role::latest()->get();
        
        return view('auth.register', compact('mems', 'grades', 'roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required',
            'matricule' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['email', 'unique:users'],
            'numeroci' => ['required', 'string', 'max:15'],
            'nomcomplet' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:15'],
            'datearrive' => ['required', 'date'],
            'datedepart' => ['required', 'date'],
            'genre' => ['required', 'string', 'max:20'],
            'photo' => 'required|image|mimes:jpg,png,jpeg,png',
        ]); 

        $image = $request->photo->store("image");

        $user = User::create([
            'grade_id'=> $request->grade_id,
            'matricule' => $request->matricule,
            'numeroci' => $request->numeroci,
            'nomcomplet' => $request->nomcomplet,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'datearrive' => $request->datearrive,
            'photo' => $image,
            'genre' => $request->genre,
            'email' => $request->email,
            'datedepart' => $request->datedepart,
            'password' => Hash::make(123456),
        ]);

        $moh = $user->id;
        $med = User:: find($moh);

        $rolesId = $request->roles;

        $med->roles()->attach($rolesId);

        event(new Registered($user));

        Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        return redirect()->back();

    }
}
