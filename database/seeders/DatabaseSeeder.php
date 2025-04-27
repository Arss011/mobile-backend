<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama_lengkap' => 'Admin',
            'name' => 'Janis Reichel',
            'alamat' => 'Jakarta Palmerah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'remember_token' => null,
        ]);

        $this->call(ProductSeeder::class);
    }
}
