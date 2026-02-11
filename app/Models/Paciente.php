<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nombres',
        'edad',
        'sexo',
        'estado_civil',
        'telefono',
        'correo',
        'direccion',
        'tipo_sangre',
        'alergias',
        'diabetes',
        'hipertension'
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}

