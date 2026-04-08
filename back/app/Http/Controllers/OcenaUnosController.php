<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocena;

class OcenaUnosController extends Controller
{
    //
    // OcenaController.php

public function store(Request $request)
{

    $request->validate([
        'ucenikId' => 'required|exists:uceniks,id',
        'predmetId' => 'required|exists:predmet_razreds,predmetId',
        'razredId' => 'required|exists:predmet_razreds,razredId',
        'datum' => 'required|date',
        'opis' => 'required',
        'polugodiste' => 'required',
        'vrednost' => 'required|numeric|between:1,5',
        'profesorId' => 'required|exists:profesors,id',
       
    ]);


    $ocena = Ocena::create([
        'ucenikId' => $request->input('ucenikId'),
        'predmetId' => $request->input('predmetId'),
        'razredId' => $request->input('razredId'),
        'datum' => $request->input('datum'),
        'opis' => $request->input('opis'),
        'polugodiste' => $request->input('polugodiste'),
        'vrednost' => $request->input('vrednost'),
        'profesorId' => $request->input('profesorId'),
 
    ]);

    
    return response()->json(['poruka' => 'Ocena uspešno uneta', 'podaci' => $ocena], 201);
}

}
