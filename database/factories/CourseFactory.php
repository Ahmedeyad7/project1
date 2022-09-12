<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomNumber(),
            'trainer_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            // 'small_desc' => $this->faker->text(),
            'desc' => $this->faker->text(),
            'price' => $this->faker->randomNumber(),
            'image' => $this->faker->image(),
        ];
    }
}
