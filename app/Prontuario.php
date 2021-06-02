<?php

namespace App;

use App\Consulta;
use App\Paciente;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{

    

    protected $table = 'prontuarios';
    protected $fillable = ['paciente_id', 'pacientes_pessoa_pessoa_cpf'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'pessoa_pessoa_cpf', 'pacientes_pessoa_pessoa_cpf');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'prontuarios_prontuario_cod', 'prontuario_cod');
    }    
}