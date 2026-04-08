<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ucenik;


class UcenikNoviUnosController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ime' => 'required|string',
            'prezime' => 'required|string',
            'odeljenjeId' => 'required|exists:odeljenjes,id',
            'username' => 'required|string|unique:uceniks,username',
            'email' => 'required|email|unique:uceniks,email',
            'password' => 'required|string',   //DODATI ZA PASSWORD DA BUDE SAKRIVEN!
        ]);

        $ucenik = Ucenik::create($validatedData);

        return response()->json(['poruka' => 'Učenik uspešno kreiran', 'podaci' => $ucenik], 201);
    }
}



