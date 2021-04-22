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

    public function cidade()
    {
        return $this->hasOne(Cidade::class, 'id', 'cidades_cidade_id');
    }

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'estados_estado_id');
    }

    


}