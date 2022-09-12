<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'desc' => $this->faker->text(),
            'image' => $this->faker->image(),
            'specialty' => 'web',
        ];
    }
}
