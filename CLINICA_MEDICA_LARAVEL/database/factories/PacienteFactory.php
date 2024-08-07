<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'data de nascimento' => $this->faker->date(),
        ];
    }
}
