<?php

namespace App\Http\Controllers;

use App\Models\Odeljenje;
use Illuminate\Http\Request;

use App\Models\Predavac;
use App\Http\Resources\OdeljenjeResource;

class OdeljenjeController extends Controller
{


    public function odeljenjaZaProfesora($profesorId)
    {
        $predajeodeljenjima = Predavac::where('profesorId', $profesorId)->get();

        foreach($predajeodeljenjima as $predajeodeljenju) {

            $odeljenje = Odeljenje::where('id', $predajeodeljenju->odeljenjeId)->first();

        if ($odeljenje) {
            $odeljenja[] = $odeljenje;
        }

        }

        return !empty($odeljenje)
            ? OdeljenjeResource::collection($odeljenja)
            : response()->json(['error' => 'Nisu pronađena odeljenja u kojima predaje dati profesor.'], 404);

    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $odeljenja = Odeljenje::withCount('ucenici')->get();
        return OdeljenjeResource::collection($odeljenja);
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
    public function show($odeljenjeId)
    {
        //
        $odeljenje = Odeljenje::find($odeljenjeId);
        if(is_null($odeljenje)) return response()->json('Nije pronadjeno odeljenje po datom id-u', 404);
        return response()->json($odeljenje);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Odeljenje $odeljenje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Odeljenje $odeljenje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Odeljenje $odeljenje)
    {
        //
    }
}
