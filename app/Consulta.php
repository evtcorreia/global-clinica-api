<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $fillable = ['consulta_data', 'consulta_horario','prontuarios_prontuario_cod','corpo_clinico_pessoa_pessoa_cpf','clinicas_id'];

    public function prontuario()
    {
        return $this->belongsTo(Prontuario::class, 'prontuarios_prontuario_cod', 'prontuario_cod');
    }

    public function exames()
    {
        return $this->hasMany(Exame::class, 'consultas_consulta_id', 'consulta_id');
    }

    public function receitas()
    {
        return $this->hasMany(Receita::class, 'consultas_consulta_id', 'consulta_id');
    }
    
} 