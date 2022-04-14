<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * [x] $table->string('title', 255);
     * [x] $table->string('authors', 255);
     * [x] $table->text('description')->nullable();
     * [x] $table->date('released_at');
     * [x] $table->string('cover_image', 255)->nullable();
     * [x] $table->integer('pages');
     * [x] $table->string('language_code', 3)->default('hu');
     * [x] $table->string('isbn', 13)->unique();
     * [x] $table->integer('in_stock');
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'authors' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'released_at' => $this->faker->date(),
            'cover_image' => $this->faker->imageUrl(),
            'pages' => $this->faker->numberBetween(10, 1500),
            'language_code' => $this->faker->languageCode(),
            'isbn' => $this->faker->isbn13(),
            'in_stock' => $this->faker->numberBetween(0, 500),
        ];
    }
}
