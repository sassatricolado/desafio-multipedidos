<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \App\Models\User::factory()->create([
            'name' => 'Samuel Araújo Venâncio',
            'email' => 'admin@admin.com.br',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Leonardo Augusto',
            'email' => 'l.august@example.com.br',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Arthur de Assis',
            'email' => 'arthurzinhoassis@example.com.br',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Luiz Henrique',
            'email' => 'keegam@example.com.br',
            'password' => Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Gabriel Marcondes',
            'email' => 'g.marc@example.com.br',
            'password' => Hash::make('password')
        ]);

        \App\Models\Car::factory()->create([
            'model' => 'Uno',
            'make' => 'Fiat',
            'year' => 2000
        ]);

        \App\Models\Car::factory()->create([
            'model' => 'Camaro',
            'make' => 'Chevrolet',
            'year' => 2001
        ]);

        \App\Models\Car::factory()->create([
            'model' => 'Onix',
            'make' => 'Chevrolet',
            'year' => 2024
        ]);

        \App\Models\Car::factory()->create([
            'model' => 'SUV',
            'make' => 'Chevrolet',
            'year' => 2003
        ]);

        \App\Models\Car::factory()->create([
            'model' => '208',
            'make' => 'Peugeot',
            'year' => 2004
        ]);
    }
}
