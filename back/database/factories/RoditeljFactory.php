<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Roditelj;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roditelj>
 */
class RoditeljFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Roditelj::class;

    public function definition(): array
    {
        return [
            //
            'ime' => $this->faker->firstName,
            'prezime' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('lozinka123'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
