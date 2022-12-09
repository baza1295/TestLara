<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
            'document' => $this->faker->imageUrl(),
            'birth_date' => $this->faker->dateTime('- 30 years'),
        ];
    }
}
