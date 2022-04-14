<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Wil Reader',
            'email' => 'reader@brs.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_librarian' => false,                // 50% probability to have true
            'remember_token' => 'kdj4ye4j9i',
        ]);
        User::create([
            'name' => 'Wil Librarian',
            'email' => 'librarian@brs.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_librarian' => true,                // 50% probability to have true
            'remember_token' => 'vdj4yz4jop',
        ]);
        User::factory(10)->create();

    }
}
