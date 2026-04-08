<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dete;
use App\Models\Roditelj;
use App\Models\Ucenik;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dete>
 */
class DeteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Dete::class;

    public function definition(): array
    {
        $roditelj = Roditelj::factory()->create();
        $ucenik = Ucenik::factory()->create();

        return [
            //
                'roditeljId' => $roditelj->id,
                'ucenikId' => $ucenik->id,
        ];
    }
}
