<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /*
    public function __construct(){
        $this->middleware('auth');
    }*/

    public function listar(){
        $clientes = Cliente::all();

        return view('clientes.listar', ['clientes' => $clientes]);
    }
}
