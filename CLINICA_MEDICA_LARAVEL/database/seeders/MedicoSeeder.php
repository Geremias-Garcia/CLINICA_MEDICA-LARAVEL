<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Medico;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria um novo usuário
        $user = User::create([
            'nome' => 'Médico teste',
            'cpf' => '12345678901',
            'endereco' => 'Endereço do Médico',
            'telefone' => '999999999',
            'role_id' => 2,
            'email' => 'medico@example.com',
            'password' => bcrypt('12345678'),
        ]);

        // Cria um novo médico vinculado ao usuário criado
        Medico::create([
            'user_id' => $user->id,
            'crm' => '12345',
            'especialidade_id' => 1, // Substitua por uma especialidade existente
        ]);
    }
}
