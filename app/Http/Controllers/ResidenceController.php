<?php

namespace App\Http\Controllers;

use App\Models\Inconnu;
use PDF;
use App\Models\Residence;
use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resi = Residence::latest()->get();
        $inconnus = Inconnu::latest()->get();
        return view('layouts.resi', compact('resi','inconnus'));
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
        $validateData = $this->validate($request, [

            'inconnu_id' => ['required'],
            'numero' => ['required', 'integer'],
            'certifions' => ['required', 'string', 'max:255'],
            'ne' => ['required', 'date'],
            'a' => ['required', 'string', 'max:255'],
            'fils' => ['required', 'string', 'max:255'],
            'et' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'resulte' => ['required', 'string', 'max:255'],
            'domicile' => ['required', 'string', 'max:255'],
            'kati' => ['required', 'date', 'max:255'],
            'dossier' => ['required', 'string', 'max:255'],

        ]);

        $resi = Residence::create([
            'inconnu_id'=> $request->inconnu_id,
            'numero' => $request->numero,
            'certifions' => $request->certifions,
            'ne' => $request->ne,
            'a' => $request->a,
            'fils' => $request->fils,
            'et' => $request->et,
            'profession' => $request->profession,
            'resulte' => $request->resulte,
            'domicile' => $request->domicile,
            'kati' => $request->kati,
            'dossier' => $request->dossier,

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
        $validateData = $request->validate([

            'inconnu_id' => ['required'],
            'numero' => ['required', 'integer'],
            'certifions' => ['required', 'string', 'max:255'],
            'ne' => ['required', 'date'],
            'a' => ['required', 'string', 'max:255'],
            'fils' => ['required', 'string', 'max:255'],
            'et' => ['required', 'string', 'max:255'],
            'profession' => ['required', 'string', 'max:255'],
            'resulte' => ['required', 'string', 'max:255'],
            'domicile' => ['required', 'string', 'max:255'],
            'kati' => ['required', 'date', 'max:255'],
            'dossier' => ['required', 'string', 'max:255'],

        ]);

        Residence::whereId($id)->update($validateData);
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
        $resi = Residence::findOrFail($id);
        $resi->delete();
        return redirect()->back();
    }

    public function downloadPDF(Request $request) {
        $resi = Residence::find($request->id);
        $pdf = PDF::loadView('layouts.residence', compact('resi'))->setPaper('a4','landscape');
       //$pdf->loadView('layouts.carte', compact('cart'));

        return $pdf->stream();
    }
}
