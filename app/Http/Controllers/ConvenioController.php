<?php

namespace App\Http\Controllers;

use App\Convenio;

class ConvenioController extends Controller
{
    public function all()
    {
        $convenios = Convenio::all();

        return $convenios;
    }
}