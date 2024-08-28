<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(EspecialidadeSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(PermissionSeeder::class);
        \App\Models\User::factory(100)->create();
    }
}
