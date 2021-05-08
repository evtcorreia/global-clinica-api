<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Clinica extends Model
{
    protected $table = 'clinicas';

    public function clinicas()
    {
        return $this->hasOne(Endereco::class, 'endereco_id', 'enderecos_endereco_id');
    }

    public function medicos()
    {
        return $this->belongsToMany(Medico::class,'clinica_clinico', 'clinica_id', 'clinico_id');
    }

}