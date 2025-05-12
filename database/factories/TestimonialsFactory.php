<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonials>
 */
class TestimonialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'location' => $this->faker->city,
            'rating' => $this->faker->numberBetween(1,5),
            'content' => $this->faker->realText(200,2)
        ];
    }
}
