<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cpf' => $this->faker->randomNumber(9) . $this->faker->randomNumber(2),
            'phone' => $this->faker->randomNumber(8) . $this->faker->randomNumber(2),
            'email' => $this->faker->email,
            'status_id' => 1
        ];
    }
}
