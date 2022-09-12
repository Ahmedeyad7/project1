<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteContentFactory extends Factory
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
            'content' =>json_encode([
                'title'=>'JAHDOIWBDIQDWLDWLMLW',
                'subtitle'=>'ksnfoibewifiweinifewnefwnkfnew',
                'desc'=>'knifiwiefffffffffffffffffffffffffffffffffffffffffffffffffffffffffff',
            ]),
        ];
    }
}
