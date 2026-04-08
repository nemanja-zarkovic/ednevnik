<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Odeljenje;
use App\Models\Razred;

class OdeljenjeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        
// Pronađi sve razrede
$razredi = Razred::all();

foreach ($razredi as $razred) {
    Odeljenje::create([
        'indeks' => 1, // Primer vrednosti za indeks
        'razredId' => $razred->id, // Koristi ID trenutnog razreda kao spoljni ključ
    ]);

    Odeljenje::create([
        'indeks' => 2, // Primer vrednosti za indeks
        'razredId' => $razred->id, // Koristi ID trenutnog razreda kao spoljni ključ
    ]);

    Odeljenje::create([
        'indeks' => 3, // Primer vrednosti za indeks
        'razredId' => $razred->id, // Koristi ID trenutnog razreda kao spoljni ključ
    ]);

}


    }
}
