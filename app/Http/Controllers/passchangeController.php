<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class passchangeController extends Controller
{
    // public function index(Request $request)
    // { 
    //     dd($request->all());
    //     return view('auth.changepwd');
    // }
    
    public function update(Request $request, $id)
    {
        $validateData = $request->validate ([
            'password' => 'required|min:6|max:10',
            'password2'=> 'confirmed',
        ]);

        if ($validateData) {
            # code...
        } else {
            return redirect()->back();
        }
        
    }
}
