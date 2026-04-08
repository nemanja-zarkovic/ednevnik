<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert(
           
            [
            'ime'=>'Nemanja',
            'prezime'=>'Zarkovic',
            'username'=>'nemanja.zarkovic',
            'password' => bcrypt('lozinka123'),
            'email'=>'nemanja@gmail.com'
            ]
            );
    }
}
