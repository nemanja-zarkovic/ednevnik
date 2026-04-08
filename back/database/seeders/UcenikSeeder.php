<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Ucenik;

class UcenikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        //
        DB::table('uceniks')->insert([
           
            [
               
                'ime' => 'Nika',
                'prezime' => 'Tosic',
                'odeljenjeId'=>1,
                'username' => 'nika.tosic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'nika@gmail.com',
            ],
            [
                
                'ime' => 'Anastasija',
                'prezime' => 'Raznatovic',
                'odeljenjeId'=>1,
                'username' => 'anastasija.raznatovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'anastasija@gmail.com',
            ],
            [
                
                'ime' => 'Veljko',
                'prezime' => 'Raznatovic',
                'odeljenjeId'=>2,
                'username' => 'veljko.raznatovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'veljko@gmail.com',
            ],
            [
                
                'ime' => 'Milica',
                'prezime' => 'Rozga',
                'odeljenjeId'=>2,
                'username' => 'milica.rozga',
                'password' => bcrypt('lozinka123'),
                'email'=> 'djordjevicmilica12@gmail.com',
            ],
            [
                
                'ime' => 'Nevena',
                'prezime' => 'Bekuta',
                'odeljenjeId'=>3,
                'username' => 'nevena.bekuta',
                'password' => bcrypt('lozinka123'),
                'email'=> 'nevena@gmail.com',
            ],
            [
                
                'ime' => 'Sofija',
                'prezime' => 'Bekvalac',
                'odeljenjeId'=>3,
                'username' => 'sofija.bekvalac',
                'password' => bcrypt('lozinka123'),
                'email'=> 'sofija@gmail.com',
            ],
            [
                
                'ime' => 'Aleksandar',
                'prezime' => 'Zivojinovic',
                'odeljenjeId'=>4,
                'username' => 'aleksandar.arena666',
                'password' => bcrypt('lozinka123'),
                'email'=> 'aleksandar@gmail.com',
            ],
            [
                
                'ime' => 'Marija',
                'prezime' => 'Zivojinovic',
                'odeljenjeId'=>4,
                'username' => 'marija.arena666',
                'password' => bcrypt('lozinka123'),
                'email'=> 'marija@gmail.com',
            ],
            [
                
                'ime' => 'Atina',
                'prezime' => 'Tosic',
                'odeljenjeId'=>5,
                'username' => 'atina.tosic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'dusko@gmail.com',
            ],
            [
                
                'ime' => 'Milan',
                'prezime' => 'Pejovic',
                'odeljenjeId'=>5,
                'username' => 'milan.pejovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'milan@gmail.com',
            ],
            [
                
                'ime' => 'Nikolija',
                'prezime' => 'Zmijanac',
                'odeljenjeId'=>6,
                'username' => 'nikolija.zmijanac',
                'password' => bcrypt('lozinka123'),
                'email'=> 'nikolija@gmail.com',
            ],
            [
                
                'ime' => 'Tara',
                'prezime' => 'Djuric',
                'odeljenjeId'=>6,
                'username' => 'tara.djuric',
                'password' => bcrypt('lozinka123'),
                'email'=> 'ana@gmail.com',
            ],
            [
                
                'ime' => 'Marko',
                'prezime' => 'Djuric',
                'odeljenjeId'=>7,
                'username' => 'marko.djuric',
                'password' => bcrypt('lozinka123'),
                'email'=> 'marko@gmail.com',
            ],
            
            [
                
                'ime' => 'Milovan',
                'prezime' => 'Djuric',
                'odeljenjeId'=>7,
                'username' => 'milovan.djuric',
                'password' => bcrypt('lozinka123'),
                'email'=> 'milovan@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Milena',
                'prezime' => 'Tosic',
                'odeljenjeId'=>8,
                'username' => 'milena.tosic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'milena@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Marko',
                'prezime' => 'Tosic',
                'odeljenjeId'=>8,
                'username' => 'marko.tosic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'markotosic@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Zeljko',
                'prezime' => 'Raznatovic',
                'odeljenjeId'=>9,
                'username' => 'zeljko.raznatovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'zeljko@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Bojana',
                'prezime' => 'Raznatovic',
                'odeljenjeId'=>9,
                'username' => 'bojana.raznatovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'bojana@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Veljko',
                'prezime' => 'Rozga',
                'odeljenjeId'=>10,
                'username' => 'veljko.rozga',
                'password' => bcrypt('lozinka123'),
                'email'=> 'veljkoRozga@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Ajzi',
                'prezime' => 'Rozga',
                'odeljenjeId'=>10,
                'username' => 'ajzi.rozga',
                'password' => bcrypt('lozinka123'),
                'email'=> 'ajzi@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Iva',
                'prezime' => 'Pejovic',
                'odeljenjeId'=>11,
                'username' => 'iva.pejovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'iva@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Jasmina',
                'prezime' => 'Pejovic',
                'odeljenjeId'=>11,
                'username' => 'jasmina.pejovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'jasmina@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Nikola',
                'prezime' => 'Zmijanac',
                'odeljenjeId'=>12,
                'username' => 'nikola.zmijanac',
                'password' => bcrypt('lozinka123'),
                'email'=> 'nikola@gmail.com',
            ]
            ,
            [
                
                'ime' => 'Radovan',
                'prezime' => 'Zivojinovic',
                'odeljenjeId'=>12,
                'username' => 'radovan.zivojinovic',
                'password' => bcrypt('lozinka123'),
                'email'=> 'radovan@gmail.com',
            ]

            
        ]);



    }
}
