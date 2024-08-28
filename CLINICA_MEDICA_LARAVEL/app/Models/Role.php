<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    private static $roles = [
        "PACIENTE" => 1,
        "MÉDICO" => 2,
    ];

    public function resource() {
        return $this->belongsToMany('\App\Models\Resource', 'permissions');
    }

    public function getRoleId($name) {
        return self::$roles[$name];
    }

    public function getidRole($id) {
        return array_search($id, self::$roles);
    }
}
