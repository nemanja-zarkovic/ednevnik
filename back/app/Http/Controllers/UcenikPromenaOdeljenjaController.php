<?php

namespace App\Http\Controllers;

use App\Models\Ucenik;
use Illuminate\Http\Request;

class UcenikPromenaOdeljenjaController extends Controller
{
    //
    public function update(Request $request, $id)
    {
        $ucenik = Ucenik::findOrFail($id);

        $validatedData = $request->validate([
            
            'odeljenjeId' => 'required|exists:odeljenjes,id',
  
        ]);

        $ucenik->update($validatedData);

        return response()->json(['poruka' => 'Učenik uspešno ažuriran', 'podaci' => $ucenik], 200);
    }
}
