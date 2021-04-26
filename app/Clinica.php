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
}