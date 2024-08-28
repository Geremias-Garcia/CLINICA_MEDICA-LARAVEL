<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //MÉDICO
            ["role_id" => 1, "resource_id" => 1, "permission" => true],
            ["role_id" => 1, "resource_id" => 2, "permission" => true],
            ["role_id" => 1, "resource_id" => 3, "permission" => true],
            //PACIENTE
            ["role_id" => 2, "resource_id" => 4, "permission" => true],
            ["role_id" => 2, "resource_id" => 5, "permission" => true],
            ["role_id" => 2, "resource_id" => 6, "permission" => true],
        ];
        DB::table('permissions')->insert($data);
    }
}
