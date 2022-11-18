<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('layouts.profil');
    }


    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $validateData = $request->validate ([
            'password' => 'required',
            'password1' => 'required',
        ]);

        $User = User::findOrFail($id);

        $userPass = $User->password;
        $passAct = $validateData['password'];

//  dd(Hash::check($passAct, $userPass));
        
        if (Hash::check($passAct, $userPass)) {
            $User->password = Hash::make($validateData['password1']);
            $ok = $User->save();
            if ($ok) {
                return redirect()->back()->with('success', 'Le nouveau mot de passe a bien été pris en compte !');
            } else {
                return redirect()->back()->with('error', 'La modification de mot de passe n\'a pas été effectuée !');
            }
        } 
        else {
           return redirect()->route('profilvue')->with('error', 'L\'ancien mot de passe saisi est incorrect !');
        }
        

        // if ($validateData) {
        //     # code...
        // } else {
        //     return redirect()->back();
        // }
        
    }


}
