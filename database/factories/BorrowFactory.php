<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * [x] $table->unsignedBigInteger('reader_id');
     * [x] $table->foreign('reader_id')->references('id')->on('users');
     *
     * [x] $table->unsignedBigInteger('book_id');
     * [x] $table->foreign('book_id')->references('id')->on('books');
     *
     * [x] $table->enum('status', ['PENDING', 'REJECTED', 'ACCEPTED', 'RETURNED']);
     *
     * [x] $table->dateTime('request_processed_at')->nullable();
     *
     * [x] $table->unsignedBigInteger('request_managed_by')->nullable();
     * [x] $table->foreign('request_managed_by')->references('id')->on('users');
     *
     * [x] $table->dateTime('deadline')->nullable();
     * [x] $table->dateTime('returned_at')->nullable();
     *
     * [x] $table->unsignedBigInteger('return_managed_by')->nullable();
     * [x] $table->foreign('return_managed_by')->references('id')->on('users');
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'status' => $this->faker->randomElement(['PENDING', 'REJECTED', 'ACCEPTED', 'RETURNED']),
            'request_processed_at' => $this->faker->dateTime(),
            'deadline' => $this->faker->dateTime()->setTimestamp(now()->getTimestamp() + $this->faker->numberBetween(1, 40320000)),
            'returned_at' => $this->faker->randomElement([NULL, now()->getTimestamp() + $this->faker->numberBetween(40320000, 80320000)]),
            'book_id' => Book::all()->random()->id,
            'reader_id' => User::readers()->random()->id,
            'request_managed_by' => User::librarians()->random()->id,
            'return_managed_by' => User::librarians()->random()->id,
        ];
    }
}
