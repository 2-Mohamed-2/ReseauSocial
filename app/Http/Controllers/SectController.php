<?php

namespace App\Http\Controllers;

use App\Models\Commissariat;
use App\Models\Section;
use Illuminate\Http\Request;

class SectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sects = Section::latest()->get();
       $commissariats = Commissariat::latest()->get();

       return view('layouts.sect', compact('sects', 'commissariats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'commissariat_id' => 'required',
            'libelle' => 'required|max:255',
            'sigle' => 'required|max:255',
            'fonction' => 'required|max:255',            
        ]);

        $sect = Section::create([
            'commissariat_id' => $request->commissariat_id,
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
            'fonction' => $request->fonction,
        ]);

        // $commissariats = Commissariat::all();
        // return view('layouts.sect', compact('commissariats'));

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
        $validateData = $this->validate($request,[
            'commissariat_id' => 'required',
            'libelle' => 'required|max:255',
            'sigle' => 'required|max:255',
            'fonction' => 'required|max:255',
        ]);

        $sect = Section::whereId($id)->update($validateData);
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
       $sect = Section::findOrFail($id);
       $sect->delete();
       return redirect()->back();
    }
}
