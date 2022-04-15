<?php

namespace Database\Seeders;

use App\Models\Borrow;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        Borrow::create([
            'status' => 'PENDING',
            'request_processed_at' => null,
            'deadline' => null,
            'returned_at' => null,
            'book_id' => 2,
            'reader_id' => 1,
            'request_managed_by' => null,
            'return_managed_by' => null,
        ]);

        Borrow::create([
            'status' => 'ACCEPTED',
            'request_processed_at' => 1652643889,
            'deadline' => 1681587889,
            'returned_at' => null,
            'book_id' => 3,
            'reader_id' => 1,
            'request_managed_by' => 2,
            'return_managed_by' => null,
        ]);

        Borrow::create([
            'status' => 'ACCEPTED',
            'request_processed_at' => 1647373489,
            'deadline' => 1649965489,
            'returned_at' => null,
            'book_id' => 8,
            'reader_id' => 1,
            'request_managed_by' => 2,
            'return_managed_by' => null,
        ]);

        Borrow::create([
            'status' => 'REJECTED',
            'request_processed_at' => 1652643889,
            'deadline' => null,
            'returned_at' => null,
            'book_id' => 4,
            'reader_id' => 1,
            'request_managed_by' => 2,
            'return_managed_by' => null,
        ]);

        Borrow::create([
            'status' => 'RETURNED',
            'request_processed_at' => 1652643889,
            'deadline' => 1681587889,
            'returned_at' => 1660587889,
            'book_id' => 5,
            'reader_id' => 1,
            'request_managed_by' => 2,
            'return_managed_by' => 1,
        ]);


        // Borrow::factory()->count(10)->create();
    }
}
