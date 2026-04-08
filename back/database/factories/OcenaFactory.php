<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ocena;
use App\Models\Ucenik;
use App\Models\Odeljenje;
use App\Models\Razred;
use App\Models\PredmetRazred;
use App\Models\Predavac;
use App\Models\Profesor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ocena>
 */
class OcenaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ocena::class;

    public function definition(): array
    {
        $ucenik = Ucenik::inRandomOrder()->first();
        $odeljenje = Odeljenje::where('id', $ucenik->odeljenjeId)->first();
        $razred = Razred::where('id', $odeljenje->razredId)->first();
        $predmetrazred = PredmetRazred::where('razredId', $razred->id)->inRandomOrder()->first();
        $predavaci = Predavac::where('odeljenjeId', $odeljenje->id)->get();

        foreach($predavaci as $predavac) {

            $profesor = Profesor::where('id', $predavac->profesorId)->where('predmetId', $predmetrazred->predmetId)->first();
            if($profesor) break;
        }

        return [
            //
        'ucenikId' => $ucenik->id,
        'predmetId' => $predmetrazred->predmetId,
        'razredId' => $predmetrazred->razredId,
        'datum' => $this->faker->unique()->dateTimeBetween('2023-09-01', 'now'),
        'opis' => $this->faker->randomElement(['pismeni zadatak - factory', 'usmeno ispitivanje - factory', 'kontrolni zadatak - factory']),
        'polugodiste' => 1,
        'vrednost' => $this->faker->numberBetween(1, 5),
        'profesorId' => $profesor->id,
        ];


    }
}
