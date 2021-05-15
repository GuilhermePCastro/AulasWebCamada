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

    public function index(Request $request)
    {
        $vendas = Venda::all();

        return Venda::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $json = $request->getContent();

        return Venda::create(json_decode($json, JSON_OBJECT_AS_ARRAY));

        //return redirect()->route('funcionarios.index')->with('success', 'Funcionario criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venda = Venda::find($id);

        if($venda){
            return $venda;
        }else{
            return json_encode([$id => 'não existe']);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venda = Venda::find($id);

        if($venda){
            $json = $request->getContent();
            $atu = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $venda->cliente_id = $atu['cliente_id'];

            return $venda->update() ? [$id => 'atualizado'] : [$id => 'erro'];

        }else{
            return json_encode([$id => 'não existe']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venda = Venda::find($id);
        if($venda){
            $ret = $venda->delete() ? [$id => 'apagado'] : [$id => 'erro'];
        }else{
            $ret = [$id => 'não existe'];
        }

        return json_encode($ret);

        //return redirect()->route('funcionarios.index')->with('success', "Funcionario $id apagado com sucesso");
    }
}
