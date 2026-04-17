<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'adm@email.com',
            'password' => '1234',
            'role' => 'ADM'
        ]);

        User::factory()->create([
            'name' => 'Cliente',
            'email' => 'cli@email.com',
            'password' => '1234',
            'role' => 'CLI'
        ]);
    }
}