<?php

namespace App\Http\Controllers;

use App\Models\Ocena;
use Illuminate\Http\Request;


use App\Models\Ucenik;
use App\Http\Resources\OcenaProfesorResource;

class OcenaProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($ucenikId, $profesorId)
    {

        $ocene = Ocena::with('ucenik')->where('profesorId', $profesorId)->where('ucenikId', $ucenikId)->get();

        return $ocene->isEmpty()
        ? response()->json(['error' => 'Trazeni ucenik nema ocene'], 404)
        : response()->json(['ocene' => OcenaProfesorResource::collection($ocene)]);

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
    public function destroy(Ocena $ocena)
    {
        //
    }
}
