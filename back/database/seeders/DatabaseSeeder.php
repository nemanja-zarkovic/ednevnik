<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoditeljSeeder::class);
        $this->call(RazredSeeder::class);
        $this->call(PredmetSeeder::class);
        $this->call(PredmetRazredSeeder::class);
        $this->call(OdeljenjeSeeder::class);
        $this->call(ProfesorSeeder::class);
        $this->call(UcenikSeeder::class);
        $this->call(PredavacSeeder::class);
        $this->call(DeteSeeder::class);
        $this->call(OcenaSeeder::class);
        $this->call(ZakljucnaOcenaSeeder::class);
        $this->call(AdminSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
