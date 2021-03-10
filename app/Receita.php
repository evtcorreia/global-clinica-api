<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'receitas';

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class);
    }
}