<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    public function pessoa()
    {

        return $this->belongsTo(Pessoa::class,'pessoa_pessoa_cpf', 'pessoa_cpf');

    }


}