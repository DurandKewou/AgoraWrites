<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'surname' => 'Test',
            'password' => bcrypt('test'), // Assurez-vous de hacher le mot de passe
            'email_verified_at' => now(), // Simuler la vérification de l'email
            'email' => 'test@example.com',
        ]);
    }
}
