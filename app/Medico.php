<?php
    namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';


    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'clinico_especialidade', 'especialidade_id', 'clinico_id');
    }
}