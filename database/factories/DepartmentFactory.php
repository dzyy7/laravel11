<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => fake()->unique()->randomElement(array:['PPLG','Animasi 2D','Animasi 3D','DKV DG','DKV TG']),
            'desc' => fake()->paragraph(5),
        ];
    }
}
