<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $fillable = ['pessoa_nome', 'pessoa_sobrenome', 'pessoa_cpf', 'pessoa_mail', 'pessoa_login', 'pessoa_senha'];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'endereco_id', 'enderecos_endereco_id');
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