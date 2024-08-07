<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;
use Faker\Provider\pt_BR\Person as FakerPerson;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $faker = FakerFactory::create('pt_BR');
        $faker->addProvider(new FakerPerson($faker));

        $roleId = $this->faker->numberBetween(1, 2);

        return [
            'nome' => $faker->name(),
            'cpf' => $faker->cpf(false),
            'endereco' => $faker->address(),
            'telefone' => $faker->phoneNumber(),
            'role_id' => $roleId,
            'email' => $faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            if ($user->role_id == 1) {
                \App\Models\Paciente::factory()->create(['user_id' => $user->id]);
            } elseif ($user->role_id == 2) {
                \App\Models\Medico::factory()->create(['user_id' => $user->id]);
            }
        });
    }
}
