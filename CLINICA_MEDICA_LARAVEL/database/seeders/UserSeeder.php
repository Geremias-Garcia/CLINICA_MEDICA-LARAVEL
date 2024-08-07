<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Medico;
use Database\Factories\MedicoFactory;
use Database\Factories\PacienteFactory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(100)->create();
    }
}
