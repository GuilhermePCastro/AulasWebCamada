<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function listar(){
        $funcionarios = Funcionario::all();

        return view('funcionarios.listar', ['funcionarios' => $funcionarios]);
    }
}
