<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grade = Grade::inRandomOrder()->first();

        return [
            'Name' => fake()->name(),
            'grade_id' => $grade->id,
            'department_id' => $grade,
            'Email' => fake()->unique()->safeEmail(),
            'Address' => fake()->address(),
        ];
    }
}
