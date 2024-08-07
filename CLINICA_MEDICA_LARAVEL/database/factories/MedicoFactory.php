<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    public function definition()
    {
        return [
            'crm' => $this->faker->numerify('######'),
            'especialidade_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
