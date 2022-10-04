<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Membre;
use App\Models\Section;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mems = Membre::latest()->get();
       // $sects = Section::latest()->get();
        $grades = Grade::latest()->get();
        
        return view('layouts.mem', compact('mems', 'grades'));
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
      $med = $this->validate($request, [
        'grade_id'=> 'required',
        'matricule' => 'required|max:255',
        'numeroci' => 'required|max:255',
        'nomcomplet' => 'required|max:255',
        'adresse' => 'required|max:255',
        'telephone' => 'required|max:255',
        'datearrive' => 'required',
        'photo' => 'required|image|mimes:jpg,png,jpeg,png',
        'genre' => 'required|max:225',
        'datedepart' => 'required',

       ]);

        $photo = $request->file('photo');
        $destination = 'image/';
        $profilImage = date('YmdHis').".".$photo->getClientOriginalExtension();
        $photo->move($destination, $profilImage);

        $request->photo = $profilImage;

       $mem = Membre::create([
        'grade_id'=> $request->grade_id,
        'matricule' => $request->matricule,
        'numeroci' => $request->numeroci,
        'nomcomplet' => $request->nomcomplet,
        'adresse' => $request->adresse,
        'telephone' => $request->telephone,
        'datearrive' => $request->datearrive,
        'photo' => $request->photo,
        'genre' => 'required|max:225',
        'datedepart' => $request->datedepart,

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
        $validateData = $this->validate($request, [
            'section' => 'max:255',
            'matricule' => 'required|max:255',
            'numeroci' => 'required|max:255',
            'nomcomplet' => 'required|max:255',
            'adresse' => 'required|max:255',
            'telephone' => 'required|max:255',
            'datearrive' => 'required',
            'photo' => 'max:255',
            'datedepart' => 'required',
        ]);

        $mem = Membre::whereId($id)->update($validateData);
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
        $mem = Membre::findOrFail($id);
        $mem->delete();
        return redirect()->back();
    }
}
