<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Book::factory(20)->has(Genre::factory()->count(2))->create();
        Book::factory(20)->create();


        foreach(Book::all() as $bck) {
            $gdr = Genre::inRandomOrder()->take(rand(1,3))->pluck('id');
            $bck->genres()->attach($gdr);
        }

    }
}
