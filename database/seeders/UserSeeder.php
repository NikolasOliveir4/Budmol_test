<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criar usuário administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Não se esqueça de criptografar a senha
            'role' => 'admin', // Papel de administrador
        ]);

        // Criar usuário participante
        User::create([
            'name' => 'Participante',
            'email' => 'participant@example.com',
            'password' => Hash::make('password'),
            'role' => 'participant', // Papel de participante
        ]);
    }
}
