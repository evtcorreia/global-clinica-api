<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $table = 'convenios';

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'convenio_paciente', 'convenios_convenio_cod', 'pacientes_pessoa_pessoa_cpf');
    }

    
}