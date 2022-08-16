<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Average>
 */
class AverageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $partial1=$this->faker->randomFloat(1, 0, 5);
        $partial2=$this->faker->randomFloat(1, 0, 5);
        $partial3=$this->faker->randomFloat(1, 0, 5);
        $final=($partial1+$partial2+$partial3)/3;

        return [
            'student' => $this->faker->name,
            'partial1' => $partial1,
            'partial2' => $partial2,
            'partial3' => $partial3,
            'final' => $final,
        ];
    }
}
