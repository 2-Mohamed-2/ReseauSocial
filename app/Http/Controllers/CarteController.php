<?php

namespace App\Http\Controllers;

use App\Models\Carte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.cart');
    }

    public function fetchcarte()
    {
        $carts = Carte::latest()->get();
        return response()->json([
            'roles'=>$carts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inconnu_id' => 'required|max:255',
            'n_delivrance' => 'required|max:255',
            'fait_le' => 'required|max:255',
            'village_de' => 'required|max:255',
            'franction_de' => 'required|max:255',
            'nationalite' => 'required|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'fils_de' => 'required|max:255',
            'et_de' =>'required|max:255',
            'profession' => 'required|max:255',
            'domicile' => 'required|max:255',
            'taille' => 'required|max:255',
            'teint' => 'required|max:255',
            'cheveux' => 'required|max:255',
            'signes' => 'required|max:255',
            'carte_n' => 'required|max:255',
         ]);
 
         if ($validator->fails()) 
         {
             return response()->json([
                 'status'=>400,
                 'errors'=>$validator->messages(),
             ]);
         }
         else {
 
             $cart = Carte::create([
                 'inconnu_id' => $request->inconnu_id,
                 'n_delivrance' => $request->n_delivrance,
                 'fait_le' => $request->fait_le,
                 'village_de' => $request->village_de,
                 'franction_de' => $request->franction_de,
                 'nationalite' => $request->nationalite,
                 'nom' => $request->nom,
                 'prenom' => $request->prenom,
                 'fils_de' => $request->fils_de,
                 'et_de' => $request->et_de,
                 'profession' => $request->profession,
                 'domicile' => $request->domicile,
                 'taille' => $request->taille,
                 'teint' => $request->teint,
                 'cheveux' => $request->cheveux,
                 'signes' => $request->signes,
                 'carte_n' => $request->carte_n,
              ]);
 
              return response()->json([
                 'status'=>200,
                 'message'=>'Insertion bien effectuée !',
             ]);
         }
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
        $carte = Carte::find($id);
        
        if ($carte) {
            return response()->json([
                'status'=>200,
                'role'=>$carte,
            ]);
        } 
        else {            
            return response()->json([
                'status'=>404,
                'message'=>'Carte non trouvé !',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'inconnu_id' => 'required|max:255',
            'n_delivrance' => 'required|max:255',
            'fait_le' => 'required|max:255',
            'village_de' => 'required|max:255',
            'franction_de' => 'required|max:255',
            'nationalite' => 'required|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'fils_de' => 'required|max:255',
            'et_de' =>'required|max:255',
            'profession' => 'required|max:255',
            'domicile' => 'required|max:255',
            'taille' => 'required|max:255',
            'teint' => 'required|max:255',
            'cheveux' => 'required|max:255',
            'signes' => 'required|max:255',
            'carte_n' => 'required|max:255',
         ]);
 
         if ($validator->fails()) 
         {
             return response()->json([
                 'status'=>400,
                 'errors'=>$validator->messages(),
             ]);
         }
         else {
 
             $carte = Carte::find($id);
 
             if ($carte) {
                 $validateData = $this->validate($request,[
                    'inconnu_id' => 'required|max:255',
                    'n_delivrance' => 'required|max:255',
                    'fait_le' => 'required|max:255',
                    'village_de' => 'required|max:255',
                    'franction_de' => 'required|max:255',
                    'nationalite' => 'required|max:255',
                    'nom' => 'required|max:255',
                    'prenom' => 'required|max:255',
                    'fils_de' => 'required|max:255',
                    'et_de' =>'required|max:255',
                    'profession' => 'required|max:255',
                    'domicile' => 'required|max:255',
                    'taille' => 'required|max:255',
                    'teint' => 'required|max:255',
                    'cheveux' => 'required|max:255',
                    'signes' => 'required|max:255',
                    'carte_n' => 'required|max:255',
                 ]);
         
                 Carte::whereId($id)->update($validateData);
                 return response()->json([
                     'status'=>200,
                     'message'=>'Modification bien effectuée !',
                 ]);
             } 
             else {
                 return response()->json([
                     'status'=>404,
                     'message'=>'Carte non trouvé !',
                 ]);
             }
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Carte::findOrFail($id);
        $cart->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Suppression bien effectuée !',
        ]);
    }
}
