<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * [x] $table->string('name', 255);
     * [x] $table->enum('style', ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark']);
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['action', 'classics', 'business', 'fiction', 'romance', 'suspense']),
            'style' => $this->faker->randomElement(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'])
        ];
    }
}
