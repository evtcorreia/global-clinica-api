<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Clinica extends Model
{
    protected $table = 'clinicas';
    protected $fillable = ['clinica_nome', 'clinica_cnpj', 'clinica_mail', 'clinica_D_E_L_E_T_', 'enderecos_endereco_id', 'clinica_tel', 'clinica_tel_area' ];

    public function clinicas()
    {
        return $this->hasOne(Endereco::class, 'endereco_id', 'enderecos_endereco_id');
    }

    public function medicos()
    {
        return $this->belongsToMany(Medico::class,'clinica_clinico', 'clinica_id', 'clinico_id');
    }

}