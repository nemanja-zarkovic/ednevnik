<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Ocena;
use App\Models\Profesor;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Models\Razred;
use App\Models\Predavac;
use App\Models\PredmetRazred;
use Carbon\Carbon;



class OcenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ucenici=Ucenik::all();
      //  $profesori=Profesor::all();
      //  $odeljenja=Odeljenje::all();

       // $matematika = Predmet::where('naziv', 'Matematika')->first();
       // $matematikaSviRazredi = PredmetRazred::where('predmetId', $matematika->id);

        foreach($ucenici as $ucenik) {

            $odeljenje = Odeljenje::where('id',$ucenik->odeljenjeId)->first();
            $razred = Razred::where('id', $odeljenje->razredId)->first();

            $predmetiRazreda = PredmetRazred::where('razredId',$razred->id)->get();

            foreach($predmetiRazreda as $predmetRazred) {

            $profesoriPredmeta = Profesor::where('predmetId', $predmetRazred->predmetId)->get();
            
            foreach($profesoriPredmeta as $profesorPredmeta) {

                $predavacPredmeta = Predavac::where('profesorId',$profesorPredmeta->id)->where('odeljenjeId', $odeljenje->id)->first();
           
                if($predavacPredmeta) break;
            }
            
            
          //  $profesorMatematike = Profesor::where('id', $predavacMatematike->profesorId);

            Ocena::create([
                'ucenikId' => $ucenik->id,
                'predmetId' => $predmetRazred->predmetId,
                'razredId' => $predmetRazred->razredId,
                'datum' => Carbon::createFromTimestamp(rand(strtotime('2023-09-01'), strtotime('2023-10-01'))), 
                'opis' => 'pismeni zadatak',
                'polugodiste' => 1,
                'vrednost' => rand(1,5),
                'profesorId' => $predavacPredmeta->profesorId,
                ]);

            }

            foreach($predmetiRazreda as $predmetRazred) {

                $profesoriPredmeta = Profesor::where('predmetId', $predmetRazred->predmetId)->get();
                
                foreach($profesoriPredmeta as $profesorPredmeta) {
    
                    $predavacPredmeta = Predavac::where('profesorId',$profesorPredmeta->id)->where('odeljenjeId', $odeljenje->id)->first();
               
                    if($predavacPredmeta) break;
                }
                
                
              //  $profesorMatematike = Profesor::where('id', $predavacMatematike->profesorId);
    
                Ocena::create([
                    'ucenikId' => $ucenik->id,
                    'predmetId' => $predmetRazred->predmetId,
                    'razredId' => $predmetRazred->razredId,
                    'datum' => Carbon::createFromTimestamp(rand(strtotime('2023-10-02'), strtotime('2023-11-01'))), 
                    'opis' => 'kontrolni zadatak',
                    'polugodiste' => 1,
                    'vrednost' => rand(1,5),
                    'profesorId' => $predavacPredmeta->profesorId,
                    ]);
    
                }

                foreach($predmetiRazreda as $predmetRazred) {

                    $profesoriPredmeta = Profesor::where('predmetId', $predmetRazred->predmetId)->get();
                    
                    foreach($profesoriPredmeta as $profesorPredmeta) {
        
                        $predavacPredmeta = Predavac::where('profesorId',$profesorPredmeta->id)->where('odeljenjeId', $odeljenje->id)->first();
                   
                        if($predavacPredmeta) break;
                    }
                    
                    
                  //  $profesorMatematike = Profesor::where('id', $predavacMatematike->profesorId);
        
                    Ocena::create([
                        'ucenikId' => $ucenik->id,
                        'predmetId' => $predmetRazred->predmetId,
                        'razredId' => $predmetRazred->razredId,
                        'datum' => Carbon::createFromTimestamp(rand(strtotime('2023-11-02'), now()->timestamp)), 
                        'opis' => 'usmeno ispitivanje',
                        'polugodiste' => 1,
                        'vrednost' => rand(1,5),
                        'profesorId' => $predavacPredmeta->profesorId,
                        ]);
        
                    }

        }

        Ocena::factory(10)->create();

    }
}
