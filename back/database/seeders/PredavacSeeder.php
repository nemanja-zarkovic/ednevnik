<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Odeljenje;
use App\Models\PredmetRazred;
use App\Models\Predmet;
use App\Models\Razred;
use App\Models\Predavac;
use App\Models\Profesor;

class PredavacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $odeljenjaPrvogRazreda = Odeljenje::where('razredId', 1)->get();
        $predmetRazrediPrvogRazreda = PredmetRazred::where('razredId', 1)->get();

        foreach ($odeljenjaPrvogRazreda as $odeljenje) {
           foreach ($predmetRazrediPrvogRazreda as $pr) {
               $predmet = Predmet::find($pr->predmetId);
               $profesor = Profesor::where('predmetId', $predmet->id)->first();

               if ($profesor) {
                  Predavac::create([
                'profesorId' => $profesor->id,
                'odeljenjeId' => $odeljenje->id,
                ]);
               }

               
            }
        }


$odeljenjaDrugogRazreda = Odeljenje::where('razredId', 2)->get();
$predmetRazrediDrugogRazreda = PredmetRazred::where('razredId', 2)->get();

foreach ($odeljenjaDrugogRazreda as $odeljenje) {
    foreach ($predmetRazrediDrugogRazreda as $pr) {
        $predmet = Predmet::find($pr->predmetId);
        $profesor = Profesor::where('predmetId', $predmet->id)->first();

        if ($profesor) {
            Predavac::create([
                'profesorId' => $profesor->id,
                'odeljenjeId' => $odeljenje->id,
            ]);
        }
    }
}

$odeljenjaTrecegRazreda = Odeljenje::where('razredId', 3)->get();
$predmetRazrediTrecegRazreda = PredmetRazred::where('razredId', 3)->get();

foreach ($odeljenjaTrecegRazreda as $odeljenje) {
    foreach ($predmetRazrediTrecegRazreda as $pr) {
        $predmet = Predmet::find($pr->predmetId);
        $profesor = Profesor::where('predmetId', $predmet->id)->first();

        if ($profesor) {
            Predavac::create([
                'profesorId' => $profesor->id,
                'odeljenjeId' => $odeljenje->id,
            ]);
        }
    }
}


$odeljenjaCetvrtogRazreda = Odeljenje::where('razredId', 4)->get();
$predmetRazrediCetvrtogRazreda = PredmetRazred::where('razredId', 4)->get();

foreach ($odeljenjaCetvrtogRazreda as $odeljenje) {
    foreach ($predmetRazrediCetvrtogRazreda as $pr) {
        $predmet = Predmet::find($pr->predmetId);
        $profesor = Profesor::where('predmetId', $predmet->id)->first();

        if ($profesor) {
            Predavac::create([
                'profesorId' => $profesor->id,
                'odeljenjeId' => $odeljenje->id,
            ]);
        }
    }
}




    }
}
