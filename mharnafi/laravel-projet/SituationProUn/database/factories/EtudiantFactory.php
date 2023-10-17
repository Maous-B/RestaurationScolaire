<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EtudiantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomEtudiant' => $this->faker->name(),
            'prenomEtudiant' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'motDePasse' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at' => now(),
            'updated_at' => now()
        ];
        
    }
}
