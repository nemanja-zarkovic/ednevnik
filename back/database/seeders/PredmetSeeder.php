<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Predmet;
class PredmetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('predmets')->insert([
           
            [
            'naziv'=>'Matematika'
            ],
            [
                
                'naziv'=>'Srpski'
            ],
            [
                'naziv'=>'Engleski'
            ],
            [
                
                'naziv'=>'Nemacki'
            ],
            [
                
                'naziv'=>'Latinski'
            ],
            [
                
                'naziv'=>'Fizika'
            ],
            [
                
                'naziv'=>'Hemija'
            ],
            [
                
                'naziv'=>'Biologija'
            ],
            [
                
                'naziv'=>'Muzicko'
            ],
            [
                
                'naziv'=>'Likovno'
            ],
            [
                
                'naziv'=>'Sociologija'
            ],
            [
                
                'naziv'=>'Filozofija'
            ],
            [
                
                'naziv'=>'Geografija'
            ],
            [
                
                'naziv'=>'Informatika'
            ],
            [
                
                'naziv'=>'Fizicko'
            ]

            // Dodajte koliko god redova želite na ovaj način.
        ]);

    }
}
