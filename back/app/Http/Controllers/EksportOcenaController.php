<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ucenik;
use App\Models\Ocena;
use App\Models\Dete;
//use Barryvdh\DomPDF\Facade;
use PDF;

class EksportOcenaController extends Controller
{
    //
    /*$roditeljId, */

        public function EksportOcena($ucenikId){

       /*     $roditeljId = auth()->id(); 
            $proveraPristupa = Dete::where('roditeljId', $roditeljId)
            ->where('ucenikId', $ucenikId)
            ->exists();

        if (!$proveraPristupa) {
            return response()->json(['error' => 'Nemate pristup ovim podacima'], 403);
        } */

        $ocene = Ocena::where('ucenikId', $ucenikId)->get();

        $pdf=PDF::loadView('pdf.ocene', compact('ocene'));
        return $pdf->download('ocene.pdf');
     
        }


}
