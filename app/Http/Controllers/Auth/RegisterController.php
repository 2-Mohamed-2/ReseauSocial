<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { 
        return Validator::make($data, [

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
            'roles' => 'string',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $image = $data['photo']->store("image");

        return $med = User::create([
            'grade_id'=> $data['grade_id'],
            'matricule' => $data['matricule'],
            'numeroci' => $data['numeroci'],
            'nomcomplet' => $data['nomcomplet'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
            'datearrive' => $data['datearrive'],
            'photo' => $image,
            'genre' => $data['genre'],
            'email' => $data['email'],
            'datedepart' => $data['datedepart'],
            'password' => Hash::make(123456),
        ]);

        $moh = $med->id;
        $user = User:: find($moh);

        $rolesId = $data['roles'];

        $user->roles()->attach($rolesId);
    }

}