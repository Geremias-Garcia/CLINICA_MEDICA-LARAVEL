<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            'Clinico Geral',
            'Pediatra',
            'Ortopedista',
            'Urologista',
        ];

        foreach ($especialidades as $especialidade) {
            DB::table('especialidades')->insert([
                'especialidade' => $especialidade,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
