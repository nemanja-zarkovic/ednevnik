<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Roditelj;
use App\Models\Ucenik;
use App\Models\Dete;

class DeteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
          $ucenici=Ucenik::all();
          $roditelji=Roditelj::all();

          foreach($ucenici as $ucenik){
            $roditeljUcenika=Roditelj::where('prezime', $ucenik->prezime)->get();
         
            foreach($roditeljUcenika as $roditelj)
            Dete::create([
                'roditeljId'=> $roditelj->id,
                'ucenikId'=> $ucenik->id,
            ]);
    
          }

          DB::table('detes')->insert([
           
            [
                'roditeljId'=>1 ,
                'ucenikId'=> 1,
            ],
            [
                'roditeljId'=>6,
                'ucenikId'=> 7,
            ],
            [
                'roditeljId'=> 6,
                'ucenikId'=> 8,
            ]
            ,
            [
                
                'roditeljId'=> 1,
                'ucenikId'=> 9,
            ]
            ,
            [
                
                'roditeljId'=>11 ,
                'ucenikId'=> 12,
            ]
            ,
            [
                
                'roditeljId'=> 11,
                'ucenikId'=> 13,
            ]
            ,
            [
                
                'roditeljId'=> 11,
                'ucenikId'=> 14,
            ]
            ,
            [
                
                'roditeljId'=> 1,
                'ucenikId'=> 15,
            ]
            ,
            [
                
                'roditeljId'=> 1,
                'ucenikId'=> 16,
            ]
            
        ]);


        Dete::factory(50)->create();

    }
}
