<?php

namespace App\Http\Controllers;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function listar(){
        $vendas = Venda::all();

        return view('vendas.listar', ['vendas' => $vendas]);
    }
}
