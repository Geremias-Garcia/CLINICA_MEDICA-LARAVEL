<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nome' => 'Médico teste',
            'cpf' => '12345678901',
            'endereco' => 'Endereço do Médico',
            'telefone' => '999999999',
            'role_id' => 2,
            'email' => 'medico@example.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
