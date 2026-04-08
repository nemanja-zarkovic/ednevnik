<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Profesor;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('profesors')->insert([
           
            [
            'ime'=>'Milica',
            'prezime'=>'Stojanovic',
            'predmetId'=>1,
            'username'=>'milica.stojanovic',
            'password' => bcrypt('lozinka123'),
            'email'=>'milicastojanovic@gmail.com'
            ],
            [
                
                'ime'=>'Gordana',
                'prezime'=>'Savic',
                'predmetId'=>2,
                'username'=>'gordana.savic',
                'password' => bcrypt('lozinka123'),
            'email'=>'gordanasavic@gmail.com'
            ],
            [
                'ime'=>'Marija',
                'prezime'=>'Kuzmanovic',
                'predmetId'=>3,
                'username'=>'marija.kuzmanovic',
                'password' => bcrypt('lozinka123'),
            'email'=>'marijakuzmanovic@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Mladen',
                'prezime'=>'Cudanov',
                'predmetId'=>4,
                'username'=>'mladen.cudanov',
                'password' => bcrypt('lozinka123'),
            'email'=>'mladencudanov@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Sasa',
                'prezime'=>'Lazarevic',
                'predmetId'=>5,
                'username'=>'sasa.lazarevic',
                'password' => bcrypt('lozinka123'),
            'email'=>'sasalazarevic@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Veljko',
                'prezime'=>'Jeremic',
                'predmetId'=>6,
                'username'=>'veljko.jeremic',
                'password' => bcrypt('lozinka123'),
            'email'=>'veljkojeremic@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Zoran',
                'prezime'=>'Radojicic',
                'predmetId'=>7,
                'username'=>'zoran.radojcic',
                'password' => bcrypt('lozinka123'),
            'email'=>'zoranradjocic@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Ivan',
                'prezime'=>'Lukovic',
                'predmetId'=>8,
                'username'=>'ivan.lukovic',
                'password' => bcrypt('lozinka123'),
            'email'=>'ivanlukovic@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Draga',
                'prezime'=>'Kragulj',
                'predmetId'=>9,
                'username'=>'dragana.kragulj',
                'password' => bcrypt('lozinka123'),
            'email'=>'draganakragulj@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Aleksandra',
                'prezime'=>'Labus',
                'predmetId'=>10,
                'username'=>'aleksandra.labus',
                'password' => bcrypt('lozinka123'),
            'email'=>'aleksandralabus@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Bojan',
                'prezime'=>'Marceta',
                'predmetId'=>11,
                'username'=>'bojan.marceta',
                'password' => bcrypt('lozinka123'),
            'email'=>'bojanmarceta@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Marko',
                'prezime'=>'Mihic',
                'predmetId'=>12,
                'username'=>'marko.mihic',
                'password' => bcrypt('lozinka123'),
            'email'=>'markomihic@gmail.com'
            ]
            ,
            [
                
                'ime'=>'Sandra',
                'prezime'=>'Jednak',
                'predmetId'=>13,
                'username'=>'sandrajednak',
                'password' => bcrypt('lozinka123'),
                'email'=>'sandra.jednak@gmail.com',
            ]
            ,
            [
                
                'ime'=>'Zoran',
                'prezime'=>'Marijanovic',
                'predmetId'=>14,
                'username'=>'zoranmarijanovic',
                'password' => bcrypt('lozinka123'),
                'email'=>'zoran.marijanovic@gmail.com',
            ]
            ,
            [
                
                'ime'=>'Zorica',
                'prezime'=>'Bogdanovic',
                'predmetId'=>15,
                'username'=>'zoricabogdanovic',
                'password' => bcrypt('lozinka123'),
                'email'=>'zorica.bogdanovic@gmail.com',
            ]
            ,
            [
                
                'ime'=>'Olivera',
                'prezime'=>'Mihic',
                'predmetId'=>1,
                'username'=>'oliveramihic',
                'password' => bcrypt('lozinka123'),
                'email'=>'olivera.mihic@gmail.com',
            ]
            ,
            [
                
                'ime'=>'Vesna',
                'prezime'=>'Todorcevic',
                'predmetId'=>15,
                'username'=>'vesnatodorcevic',
                'password' => bcrypt('lozinka123'),
                'email'=>'vesna.todorcevic@gmail.com',
            ]

          
        ]);
    }
}
