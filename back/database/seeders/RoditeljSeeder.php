<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Roditelj;

class RoditeljSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
           DB::table('roditeljs')->insert([
           
            [
               
                'ime' => 'Jelena',
                'prezime' => 'Karleusa',
                'username' => 'karleusa.superstar',
                'password' => bcrypt('lozinka123'),
                'email'=> 'jelena@gmail.com',
            ],
            [
                
                'ime' => 'Svetlana Ceca',
                'prezime' => 'Raznatovic',
                'username' => 'svetlanaceca.raznatovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'svetlana@gmail.com',
            ],
            [
                
                'ime' => 'Jelena',
                'prezime' => 'Rozga',
                'username' => 'jelena.rozga',
                'password' => bcrypt('lozinka123'),
                'email'=> 'rozga@gmail.com',
            ],
            [
                
                'ime' => 'Ana',
                'prezime' => 'Bekuta',
                'username' => 'ana.bekuta',
                'password' => bcrypt('lozinka123'),
                'email'=> 'bekuta@gmail.com',
            ],
            [
                
                'ime' => 'Natasa',
                'prezime' => 'Bekvalac',
                'username' => 'natasa.bekvalac',
                'password' => bcrypt('lozinka123'),
                'email'=> 'natasa@gmail.com',
            ],
            [
                
                'ime' => 'Aleksanda',
                'prezime' => 'Prijovic',
                'username' => 'prija.arena666',
                'password' => bcrypt('lozinka123'),
                'email'=> 'aleksandra@gmail.com',
            ],
            [
                
                'ime' => 'Filip',
                'prezime' => 'Zivojinovic',
                'username' => 'poznatsuprug.arena666',
                'password' => bcrypt('lozinka123'),
                'email'=> 'filip@gmail.com',
            ],
            [
                
                'ime' => 'Dusko',
                'prezime' => 'Tosic',
                'username' => 'dusko.tosic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'dusko@gmail.com',
            ],
            [
                
                'ime' => 'Aco',
                'prezime' => 'Pejovic',
                'username' => 'aco.pejovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'aco@gmail.com',
            ],
            [
                
                'ime' => 'Vesna',
                'prezime' => 'Zmijanac',
                'username' => 'vesna.zmijanac',
                'password' => bcrypt('lozinka123'),
                'email'=> 'vesna@gmail.com',
            ],
            [
                
                'ime' => 'Ana',
                'prezime' => 'Nikolic',
                'username' => 'ana.nikolic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'ana@gmail.com',
            ],
            [
                
                'ime' => 'Stefan',
                'prezime' => 'Djuric',
                'username' => 'rasta3211',
                'password' => bcrypt('lozinka123'),
                'email'=> 'rasta@gmail.com',
            ]

            
        ]);

        }
}
