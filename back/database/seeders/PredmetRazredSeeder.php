<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\PredmetRazred;
use App\Models\Predmet;
use App\Models\Razred;

class PredmetRazredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $matematika = Predmet::where('naziv', 'Matematika')->first();
$srpski = Predmet::where('naziv', 'Srpski')->first();
$engleski = Predmet::where('naziv', 'Engleski')->first();
$nemacki = Predmet::where('naziv', 'Nemacki')->first();
$informatika = Predmet::where('naziv', 'Informatika')->first();
$fizicko = Predmet::where('naziv', 'Fizicko')->first();
$biologija = Predmet::where('naziv', 'Biologija')->first();
$fizika = Predmet::where('naziv', 'Fizika')->first();
$hemija = Predmet::where('naziv', 'Hemija')->first();

$razrediSvi = Razred::all();

foreach ($razrediSvi as $razred) {
    PredmetRazred::create([
        'predmetId' => $matematika->id,
        'razredId' => $razred->id,
        'fondCasova' => 5,
    ]);

    PredmetRazred::create([
        'predmetId' => $srpski->id,
        'razredId' => $razred->id,
        'fondCasova' => 5,
    ]);

    PredmetRazred::create([
        'predmetId' => $engleski->id,
        'razredId' => $razred->id,
        'fondCasova' => 4,
    ]);

    PredmetRazred::create([
        'predmetId' => $nemacki->id,
        'razredId' => $razred->id,
        'fondCasova' => 2,
    ]);

    PredmetRazred::create([
        'predmetId' => $fizika->id,
        'razredId' => $razred->id,
        'fondCasova' => 4,
    ]);

    PredmetRazred::create([
        'predmetId' => $hemija->id,
        'razredId' => $razred->id,
        'fondCasova' => 4,
    ]);

    PredmetRazred::create([
        'predmetId' => $biologija->id,
        'razredId' => $razred->id,
        'fondCasova' => 3,
    ]);

    PredmetRazred::create([
        'predmetId' => $informatika->id,
        'razredId' => $razred->id,
        'fondCasova' => 2,
    ]);

    PredmetRazred::create([
        'predmetId' => $fizicko->id,
        'razredId' => $razred->id,
        'fondCasova' => 2,
    ]);
}

$muzicko = Predmet::where('naziv', 'Muzicko')->first();
$likovno = Predmet::where('naziv', 'Likovno')->first();
$latinski = Predmet::where('naziv', 'Latinski')->first();

$razredPrvi = Razred::where('godinaRazreda', 'prva')->first();
$razredDrugi = Razred::where('godinaRazreda', 'druga')->first();

PredmetRazred::create([
    'predmetId' => $muzicko->id,
    'razredId' => $razredPrvi->id,
    'fondCasova' => 1,
]);

PredmetRazred::create([
    'predmetId' => $likovno->id,
    'razredId' => $razredPrvi->id,
    'fondCasova' => 1,
]);

PredmetRazred::create([
    'predmetId' => $latinski->id,
    'razredId' => $razredPrvi->id,
    'fondCasova' => 2,
]);

PredmetRazred::create([
    'predmetId' => $muzicko->id,
    'razredId' => $razredDrugi->id,
    'fondCasova' => 1,
]);

PredmetRazred::create([
    'predmetId' => $likovno->id,
    'razredId' => $razredDrugi->id,
    'fondCasova' => 1,
]);

PredmetRazred::create([
    'predmetId' => $latinski->id,
    'razredId' => $razredDrugi->id,
    'fondCasova' => 2,
]);

$sociologija = Predmet::where('naziv', 'Sociologija')->first();
$filozofija = Predmet::where('naziv', 'Filozofija')->first();
$geografija = Predmet::where('naziv', 'Geografija')->first();

$razredTreci = Razred::where('godinaRazreda', 'treca')->first();
$razredCetvrti = Razred::where('godinaRazreda', 'cetvrta')->first();

PredmetRazred::create([
    'predmetId' => $sociologija->id,
    'razredId' => $razredTreci->id,
    'fondCasova' => 2,
]);

PredmetRazred::create([
    'predmetId' => $filozofija->id,
    'razredId' => $razredTreci->id,
    'fondCasova' => 2,
]);

PredmetRazred::create([
    'predmetId' => $geografija->id,
    'razredId' => $razredTreci->id,
    'fondCasova' => 2,
]);

PredmetRazred::create([
    'predmetId' => $sociologija->id,
    'razredId' => $razredCetvrti->id,
    'fondCasova' => 2,
]);

PredmetRazred::create([
    'predmetId' => $filozofija->id,
    'razredId' => $razredCetvrti->id,
    'fondCasova' => 2,
]);

PredmetRazred::create([
    'predmetId' => $geografija->id,
    'razredId' => $razredCetvrti->id,
    'fondCasova' => 2,
]);

        
    }
}
