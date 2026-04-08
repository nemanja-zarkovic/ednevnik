<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use Illuminate\Http\Request;

use App\Http\Resources\OcenaResource;

class OcenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ocene = Ocena::orderByDesc('datum')->take(100)->get();

        //return OcenaResource::collection($ocene);
        return response()->json(['ocene' => OcenaResource::collection($ocene)]);
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
    public function show(Ocena $ocena)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ocena $ocena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ocena $ocena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ucenikId, $predmetId, $razredId, $datum)
    {
        $ocena = Ocena::where('ucenikId', $ucenikId)
        ->where('predmetId', $predmetId)
        ->where('razredId', $razredId)
        ->where('datum', $datum)
        ->first();


        if (!$ocena) {
        return response()->json(['message' => 'Ocena nije pronađena.'], 404);
        }

        $ocena->delete();

        return response()->json(['message' => 'Ocena je uspešno obrisana.']);
    }

}
