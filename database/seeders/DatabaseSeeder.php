<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\User::factory()->create([
             'name' => 'Reymond Admin',
             'email' => 'test@example.com',
             'email_verified_at' => now(),
             'password' => bcrypt('password'),
             'remember_token' => \Illuminate\Support\Str::random(10),
         ]);

        $this->call(ProductSeeder::class);
    }
}
