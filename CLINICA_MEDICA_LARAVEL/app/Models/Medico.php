<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'medico_id');
    }
}
