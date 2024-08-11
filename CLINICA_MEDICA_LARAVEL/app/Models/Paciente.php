<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Agendamento;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'data_de_nascimento',
    ];

    public function agendamentos(){
        return $this->hasMany(Agendamento::class, 'paciente_id');
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
