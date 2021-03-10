<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    //otected $primaryKey = 'convenio_cod';

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_pessoa_cpf', 'pessoa_cpf');
    }

    public function convenios()
    {        
        
        return $this->belongsToMany(Convenio::class, 'convenio_paciente', 'paciente_id', 'convenio_id');
        //return $this->belongsToMany(Convenio::class, 'convenio_paciente', 'paciente_cpf', 'convenio_id');
        
    }

    public function prontuario()
    {
        return $this->hasOne(Prontuario::class, 'pacientes_pessoa_pessoa_cpf', 'pessoa_pessoa_cpf',);
    }
}