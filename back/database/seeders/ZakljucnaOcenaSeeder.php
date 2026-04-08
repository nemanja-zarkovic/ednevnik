<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ocena;
use App\Models\Profesor;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Models\Razred;
use App\Models\Predavac;
use App\Models\PredmetRazred;
use Carbon\Carbon;
use App\Models\ZakljucnaOcena;



class ZakljucnaOcenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ucenici=Ucenik::all();

        foreach ($ucenici as $ucenik) {
            $odeljenje = Odeljenje::where('id',$ucenik->odeljenjeId)->first();
            $razred = Razred::where('id', $odeljenje->razredId)->first();

            $predmetiRazreda = PredmetRazred::where('razredId',$razred->id)->get(); //koji su predmeti u tom razredu

           //za svaki predmet svakom uceniku izracunaj ocenu
            foreach ($predmetiRazreda as $predmetRazred) {

                $profesoriPredmeta = Profesor::where('predmetId', $predmetRazred->predmetId)->get();
            
                foreach($profesoriPredmeta as $profesorPredmeta) {
    
                    $predavacPredmeta = Predavac::where('profesorId',$profesorPredmeta->id)->where('odeljenjeId', $odeljenje->id)->first();
               
                    if($predavacPredmeta) break;
                }


                $oceneZaPredmet = Ocena::where('ucenikId', $ucenik->id)
                    ->where('predmetId', $predmetRazred->predmetId)
                    ->get();
                
              
                if ($oceneZaPredmet->count() > 0) {
                    
                    $prosek = $oceneZaPredmet->avg('vrednost');
        
                
                    $zakljucnaOcena = round($prosek, 2);
        
        
                    ZakljucnaOcena::create([
                        'ucenikId' => $ucenik->id,
                        'predmetId' => $predmetRazred->predmetId,
                        'razredId' => $predmetRazred->razredId,
                        'profesorId' => $predavacPredmeta->profesorId,
                        'polugodiste' => 1,
                        'vrednost' => $zakljucnaOcena,
                        
                        ]);
        
                    

                 
                } else {
                    
                    $zakljucnaOcena = null;
                    ZakljucnaOcena::create([
                        'ucenikId' => $ucenik->id,
                        'predmetId' => $predmetRazred->predmetId,
                        'razredId' => $predmetRazred->razredId,
                        'profesorId' => $predavacPredmeta->profesorId,
                        'polugodiste' => 1,
                        'vrednost' => $zakljucnaOcena,
                        ]);
                }
        
             
            }
        }
        
            
        





    }

}

