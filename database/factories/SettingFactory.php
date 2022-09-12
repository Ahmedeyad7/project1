<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
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
            'email' => $this->faker->email(),
            'favicon' => $this->faker->image(),
            'logo' => $this->faker->image(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'fb' => $this->faker->url(),
            'insta' => $this->faker->url(),
            'twitter' => $this->faker->url(),
        ];
    }
}
