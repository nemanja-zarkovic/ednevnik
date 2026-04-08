<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Predavac;
use App\Models\Predmet;
use Illuminate\Http\Request;

use App\Http\Resources\ProfesorResource;
use App\Models\Odeljenje;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //FUNKCIJE ADMINA:

    //index() funkciju koristi admin kada zeli da mu se izlistaju svi podaci o svim profesorima iz baze
    public function index()
    {
        //
        $profesori = Profesor::with('predmet', 'odeljenja')->get();
        return ProfesorResource::collection($profesori);
       
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
    public function show($profesorId)
    {
        //
        $profesor = Profesor::find($profesorId);
        if(is_null($profesor)) return response()->json('Nije pronadjen profesor po datom id-u', 404);
        return response()->json($profesor); 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesor $profesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesor $profesor)
    {
        //
    }


    //FUNKCIJE UCENIKA/RODITELJA

    //funkcija koja se koristi kada ucenik/roditelj zeli da vidi ime i prezime profesora
    //koji mu predaje neki predmet (iz liste predmeta biraju jedan predmet pa onda dalje biraju da vide profesora
    //na tom predmetu)
    public function profesorZaPredmetIOdeljenje($odeljenjeId, $predmetId)
    {
        $predavaci = Predavac::where('odeljenjeId', $odeljenjeId)->get();

      //  $profesor = null;
        
        foreach($predavaci as $predavac) {
            $profesor = Profesor::where('id', $predavac->profesorId)->where('predmetId', $predmetId)->first();

            if($profesor) break;
        }
       

        return $profesor
        ? new ProfesorResource($profesor)
        : response()->json(['error' => 'Nije pronađen profesor za dati predmet i odeljenje.'], 404);
    }

    public function profesoriZaOdeljenje($odeljenjeId)
    {

        $predavaci = Predavac::where('odeljenjeId', $odeljenjeId)->get();

        foreach($predavaci as $predavac) {

            $profesor = Profesor::with('predmet')->where('id', $predavac->profesorId)->first();

        if ($profesor) {
            $profesori[] = $profesor;
        }

        }

        return !empty($profesori)
            ? ProfesorResource::collection($profesori)
            : response()->json(['error' => 'Nisu pronađeni profesori za dati predmet i odeljenje.'], 404);

    }

    
}
