<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //MENU PACIENTE
            ["nome" => "PACIENTE"], //4
            ["nome" => "paciente.agendamento"], //5
            ["nome" => "paciente.visualizarAtendimento"], //6
            //MENU MÉDICO ------------------------------
            ["nome" => "MÉDICO"], //1
            ["nome" => "medico.crudAgendamento"], //2
            ["nome" => "medico.atendimento"],  //3

        ];
        DB::table('resources')->insert($data);
    }
}
