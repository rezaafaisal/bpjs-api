<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gender_id' => rand(1, 2),
            'name' => fake()->name(),
            'nik' => fake()->numerify('#################'),
            'card_num' => fake()->numerify('#############'),
            'birthday' => fake()->date()
        ];
    }
}
