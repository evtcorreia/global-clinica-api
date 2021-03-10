<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pessoa extends Model
{
    protected $table = 'pessoas';

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'pessoa_pessoa_cpf', 'pessoa_cpf');
    }
    
    public function telefones()
    {
        
        return $this->hasMany(Telefone::class, 'pessoa_pessoa_cpf', 'pessoa_cpf');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class,'pessoa_pessoa_cpf', 'pessoa_cpf');
    }

}