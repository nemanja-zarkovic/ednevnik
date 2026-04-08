<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Predmet;
use App\Models\Ucenik;
use App\Models\PredmetRazred;
use App\Models\Odeljenje;

use App\Http\Resources\PredmetResource;

class PredmetController extends Controller
{


    public function predmetiZaUcenika($ucenikId)
    {

        $ucenik = Ucenik::find($ucenikId);
        if (!$ucenik) {
            return response()->json(['error' => 'Učenik nije pronađen'], 404);
        }


        //$odeljenje = Odeljenje::where('id', $odeljenjeId)->first();
        $odeljenje = $ucenik->odeljenje;
        if (!$odeljenje) {
            return response()->json(['error' => 'Odeljenje nije pronađeno'], 404);
        }

        $predmetirazreda = PredmetRazred::where('razredId', $odeljenje->razredId)->get();

        $predmeti = [];
        
        foreach($predmetirazreda as $predmetrazreda) {

            $predmet = Predmet::where('id', $predmetrazreda->predmetId)->first();

        if ($predmet) {
            $predmeti[] = $predmet;
        }

        }

        return !empty($predmeti)
            ? PredmetResource::collection($predmeti)
            : response()->json(['error' => 'Nisu pronađeni predmeti za datog ucenika.'], 404);

    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $predmeti = Predmet::with('razredi')->get();
        return PredmetResource::collection($predmeti);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($predmetId)
    {
        //
        $predmet = Predmet::find($predmetId);
        if(is_null($predmet)) return response()->json('Nije pronadjen profesor po datom id-u', 404);
        return response()->json($predmet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Predmet $predmet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Predmet $predmet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Predmet $predmet)
    {
        //
    }
}
