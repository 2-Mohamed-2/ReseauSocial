<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Carte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
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
        $carts = Carte::all();
        return view('layouts.cart', compact('carts'));
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
       $this->validate($request,[
            //'inconnu_id' => 'required|max:255',
            'n_delivrance' => 'required|max:255',
            'village_de' => 'required|max:255',
            'franction_de' => 'required|max:255',
            'nationalite' => 'required|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'fils_de' => 'required|max:255',
            'et_de' =>'required|max:255',
            'photo' => 'required|image|mimes:jpg,png,jpeg,png',
            'profession' => 'required|max:255',
            'domicile' => 'required|max:255',
            'taille' => 'required|max:255',
            'teint' => 'required|max:255',
            'cheveux' => 'required|max:255',
            'signes' => 'required|max:255',
            'carte_n' => 'required|max:255',
         ]);

          $image = $request->photo->store("image");
 
             $cart = Carte::create([
                //'inconnu_id' => $request->inconnu_id,
                 'n_delivrance' => $request->n_delivrance,
                 'village_de' => $request->village_de,
                 'franction_de' => $request->franction_de,
                 'nationalite' => $request->nationalite,
                 'nom' => $request->nom,
                 'prenom' => $request->prenom,
                 'fils_de' => $request->fils_de,
                 'et_de' => $request->et_de,
                 'photo' => $image,
                 'profession' => $request->profession,
                 'domicile' => $request->domicile,
                 'taille' => $request->taille,
                 'teint' => $request->teint,
                 'cheveux' => $request->cheveux,
                 'signes' => $request->signes,
                 'carte_n' => $request->carte_n,
              ]);
 
              return redirect()->back();
           
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
           // 'inconnu_id' => 'max:255',
            'n_delivrance' => 'required|max:255',
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
 
 
         if ($request->has('photo')) {

            $carte = Carte::findOrFail($id);

            Storage::delete($carte->photo);

            // $photo = $request->file('photo');
            // $destination = 'image/';
            // $profilImage = date('YmdHis').".".$photo->getClientOriginalExtension();
            // $photo->move($destination, $profilImage);

            // $request->photo = $profilImage;
    
            // $validateData['photo'] = $request->photo;

            $image = $request->photo->store("image");
            $validateData['photo'] = $image;
        }
      
        Carte::whereId($id)->update($validateData);
        return redirect()->back();
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
        
        Storage::delete($cart->photo);
        $cart->delete();
        return redirect()->back();
    }

    public function downloadPDF() {
        $carts = Carte::all();
        $pdf = App::make('dompdf.wrapper');
       $pdf->loadView('layouts.carte', compact('carts'));
        
        return $pdf->stream();
    }
  
}
