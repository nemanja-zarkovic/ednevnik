<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Razred;

class RazredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        DB::table('razreds')->insert([
           
            [
            'godinaRazreda'=>'prva'
            ],
            [
                
                'godinaRazreda'=>'druga'
            ],
            [
                'godinaRazreda'=>'treca'
            ],
            [
                
                'godinaRazreda'=>'cetvrta'
            ]

            // Dodajte koliko god redova želite na ovaj način.
        ]);


      
}
}