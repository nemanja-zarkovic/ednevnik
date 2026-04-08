<?php

namespace App\Http\Controllers;

use App\Models\Ucenik;
use Illuminate\Http\Request;

use App\Models\Dete;
use App\Http\Resources\UcenikResource;

class UcenikController extends Controller
{

    public function uceniciZaRoditelja($roditeljId)
    {
        $deca = Dete::where('roditeljId', $roditeljId)->get();
        
        foreach($deca as $dete) {
            $ucenik = Ucenik::where('id', $dete->ucenikId)->first();

            if ($ucenik) {
                $ucenici[] = $ucenik;
            }
        } 

        return !empty($ucenici)
        ? UcenikResource::collection($ucenici)
        : response()->json(['error' => 'Ucenici nisu pronadjeni'], 404);
    }

    public function uceniciOdeljenja($odeljenjeId) {
        $ucenici = Ucenik::where('odeljenjeId', $odeljenjeId)->get();

        return !empty($ucenici)
        ? UcenikResource::collection($ucenici)
        : response()->json(['error' => 'Ucenici nisu pronadjeni'], 404);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ucenici = Ucenik::all();
        return UcenikResource::collection($ucenici);
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
      
        $request->validate([
            'ime' => 'required|string',
            'prezime' => 'required|string',
            'odeljenjeId' => 'required|exists:odeljenjes,id', 
            
        ]);

     
        $ucenik = Ucenik::create([
            'ime' => $request->input('ime'),
            'prezime' => $request->input('prezime'),
            'odeljenjeId' => $request->input('odeljenjeId'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email'=>  $request->input('email'),
           
        ]);

        
        return response()->json($ucenik, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($ucenikId)
    {
        //
        $ucenik = Ucenik::find($ucenikId);
        if(is_null($ucenik)) return response()->json('Nije pronadjen ucenik po datom id-u', 404);
        return new UcenikResource($ucenik);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ucenik $ucenik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ucenik $ucenik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ucenik $ucenik)
    {
        //
    }
}
