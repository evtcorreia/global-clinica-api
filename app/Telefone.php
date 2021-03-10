<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'telefones';

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_pessoa_cpf', 'pessoa_cpf');
    }

}