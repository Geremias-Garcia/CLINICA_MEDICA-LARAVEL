<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Faker\Provider\pt_BR\Person as FakerPerson;

class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    public function definition()
    {
        $faker = FakerFactory::create('pt_BR');
        $faker->addProvider(new FakerPerson($faker));

        return [
            'user_id' => \App\Models\User::factory(),
            'crm' => $faker->unique()->numerify('######'),
            'especialidade_id' => \App\Models\Especialidade::inRandomOrder()->first()->id,
        ];
    }
}
