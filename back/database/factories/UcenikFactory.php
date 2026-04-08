<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ucenik;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ucenik>
 */
class UcenikFactory extends Factory
{
    protected $model = Ucenik::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'ime' => $this->faker->firstName,
            'prezime' => $this->faker->lastName,
            'odeljenjeId' => $this->faker->numberBetween(1, 12),
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('lozinka123'), // pretpostavljajući da koristite istu lozinku za svakog učenika
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
